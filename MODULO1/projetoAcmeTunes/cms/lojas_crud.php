<?php 

    session_start();

    require_once("../bd/conexao.php");
    $conexao = conexaoMysql();

    $endereco = null;
    $cep = null;
    $mapa = null;
    $btn_modo = "Salvar";
	
	$cod_estado = 0;
    $cod_cidade = 0;
    $cidade = "";

    if(isset($_GET['ativo'])){
        
        $loja_ativo = $_GET['ativo'];
        $cod_loja = $_GET['id'];
        
        if($loja_ativo == 0){
            $loja_ativo = 1;
                
        } else if ($loja_ativo == 1){
            $loja_ativo = 0;
        }
        
        $sql = "UPDATE tbl_loja SET ativo=".$loja_ativo." WHERE cod_loja=".$cod_loja;
        
        mysqli_query($conexao, $sql);
    }
    

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        $cod_loja = $_GET['id'];
        
        $_SESSION['cod_loja'] = $cod_loja;
        
        if($modo == "excluir"){
            
            $sql = "DELETE FROM tbl_loja WHERE cod_loja=".$cod_loja;
            mysqli_query($conexao, $sql);

        } else if ($modo == "buscar"){
            
            $btn_modo = "Editar";
            
            $sql = "SELECT * FROM tbl_loja JOIN tbl_cidade ON tbl_loja.cod_cidade = tbl_cidade.cod_cidade JOIN tbl_estado ON tbl_cidade.cod_estado = tbl_estado.cod_estado WHERE tbl_loja.cod_loja=".$cod_loja;
            
            $select = mysqli_query($conexao, $sql);
            
            if($rsloja=mysqli_fetch_array($select)){
                $endereco = $rsloja['endereco'];
                $cep = $rsloja['cep'];
                $mapa = $rsloja['endereco_mapa'];
				$cod_cidade = $rsloja['cod_cidade'];
				$cod_estado = $rsloja['cod_estado'];
				$cidade = $rsloja['cidade'];
				$estado = $rsloja['estado'];
            }
        }
    }


    //CADASTRO DAS LOJAS
    if(isset($_POST['btn-cadastrar-loja'])){
        
        $endereco = $_POST['txt-endereco'];
        $cep = $_POST['txt-cep'];
        $mapa = $_POST['txt-link'];
        $cod_cidade = $_POST['slt-cidade'];
        
        if($_POST['btn-cadastrar-loja'] == "Salvar"){
            
            //INSERÇÃO NA TABELA DE LOJAS
            $sql = "INSERT INTO tbl_loja (endereco, cep, endereco_mapa, cod_cidade) VALUES ('".$endereco."', '".$cep."', '".$mapa."', ".$cod_cidade.");";

            
        } else if ($_POST['btn-cadastrar-loja'] == "Editar"){
            //ATUALIZAR REGISTRO NA TABELA DE LOJAS
            $sql = "UPDATE tbl_loja SET endereco='".$endereco."', cep='".$cep."', endereco_mapa='".$mapa."',cod_cidade=".$cod_cidade." WHERE cod_loja=".$_SESSION['cod_loja'];
                        
        }
        
        
        if(mysqli_query($conexao, $sql)){
            header("location:lojas_crud.php");
        } else {
            echo("<script> alert('Erro no cadastro') </script>");
        }
        
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS
        </title>
        
        <link rel="stylesheet" type="text/css" href="css/cms.css">
        <link rel="stylesheet" type="text/css" href="css/lojas_crud.css">
        <script src="../js/jquery.min.js"></script>

        
        <script type="text/javascript">


             $(document).ready(function() {
                $("#cadastro-lojas").hide();
                $("#cadastro-cidade").hide();
                $("#lojas").click(MostrarCadastroLoja);
                $("#cidades").click(MostrarCadastroCidade);
                $("#editar-loja").click(EditarLoja);

                        $('#slt-estado').change(function(){
                            
                            $.ajax({     
                            type: "GET", //"POST"
                            url: "cidades.php",
                            data: {codigo: document.getElementById('slt-estado').value},
                            dataType: "html",
                            success:function(dados){
                                $("#slt-cidade").html(dados);
                                console.log(dados);
                            }
                            
                            });
                    
                    });
                });
 
            function MostrarCadastroLoja(){
                $("#cadastro-lojas").toggle();
            }
            function MostrarCadastroCidade(){
                $("#cadastro-cidade").toggle();
            }
			function EditarLoja(){
				$("#cadastro-lojas").show();
			}

        </script>
		
		<?php 
		
			if(isset($_GET['modo'])){
				
				$modo = $_GET['modo'];
		
				if($modo == "buscar"){
					echo("<script type='text/javascript'>
				$(document).ready(function() {
					$('#cadastro-lojas').show();
					});
			</script>");
				}
			}
		
		
		?>
        
        <meta charset="utf-8">
        
    </head>
    <body>
        <div id="caixa-cms" class="center">
            <header>
                <?php require_once("menu.php") ?>
            </header>
            
    
            <div id="caixa-conteudo"> 
                <h2 id="titulo-crud"> Nossas Lojas </h2>
                
                <div id="caixa-menu">
                    <div class="menu">
                        <p class="titulo-menu" id="lojas"> Cadastrar Lojas</p>
                        
                            <div id="cadastro-lojas">
                                <form name="frm-lojas" method="post" action="lojas_crud.php">
                                     <div id="caixa-endereco"> 
                                        <p> Endereço </p>
                                        <input type="text" name="txt-endereco" value="<?php echo($endereco)?>" required/>
                                     </div>

                                     <div id="caixa-cep"> 
                                        <p> CEP </p>
                                        <input type="text" name="txt-cep" id="txt-cep" value="<?php echo($cep)?>" onkeypress="return mascCep(event);" required/>
                                     </div>

                                     <div id="caixa-estado">
                                        <p> Estado </p>
                                        <select name="slt-estado" id="slt-estado" required >
										
											<?php
												if($modo == "buscar"){
											?>
											<option value="<?php echo($cod_estado) ?>" selected> <?php echo($estado) ?></option>
											<?php } else { ?>
				
                                             <option value="" selected> Selecione um estado</option>
					
                                             <?php 
												}
											 
                                                $sql = "SELECT * FROM tbl_estado WHERE cod_estado <>".$cod_estado." ORDER BY estado";

                                                $select = mysqli_query($conexao, $sql);

                                                while($rsestados=mysqli_fetch_array($select)){
                                             ?>

                                             <option value="<?php echo($rsestados['cod_estado']) ?>"> <?php echo($rsestados['estado']) ?> </option>
                                             <?php } ?>
                                         </select>
                                     </div>

                                     <div id="caixa-cidade">
                                        <p> Cidade </p>
                                        <select name="slt-cidade" id="slt-cidade" required>

                                        <?php 
                                            if($modo == "buscar"){
                                        ?>
                                            
                                            <option value="<?php echo($cod_cidade) ?>"> <?php echo($cidade) ?></option>
                                           
                                        <?php  } else {?>
                                            <option value=""> Selecione uma cidade</option>
                                        <?php } ?> 
                                        </select>
                                     </div>

                                     <div id="caixa-link">
                                        <p> Link Mapa</p>
                                        <textarea name="txt-link" required><?php echo($mapa)?></textarea>
                                     </div>

                                    <input class="btn-cadastrar" type="submit" name="btn-cadastrar-loja" value="<?php echo($btn_modo) ?>"/>
                                </form>
                            </div>
                        </div>
                </div>
                
                <table id="registros">
                    <tr>
                        <td class="titulo-coluna"> Código </td>
                        <td class="titulo-coluna"> Endereço </td>
                        <td class="titulo-coluna"> Cidade </td>
                        <td class="titulo-coluna"> UF </td>
                    </tr>

                <?php

                    $sql = "SELECT tbl_loja.cod_loja, tbl_loja.endereco, tbl_cidade.cidade, tbl_estado.estado, tbl_loja.ativo FROM tbl_loja JOIN tbl_cidade ON tbl_loja.cod_cidade = tbl_cidade.cod_cidade JOIN tbl_estado ON tbl_cidade.cod_estado = tbl_estado.cod_estado";

                    $select = mysqli_query($conexao, $sql);    
                
                    while($rsregistros=mysqli_fetch_array($select)){
                ?>
                    <tr> 
                        <td class="dados-coluna"><?php echo($rsregistros['cod_loja']) ?></td>
                        <td class="dados-coluna"><?php echo($rsregistros['endereco']) ?></td>
                        <td class="dados-coluna"><?php echo($rsregistros['cidade']) ?></td>
                        <td class="dados-coluna"><?php echo($rsregistros['estado']) ?></td>
                        <td class="dados-coluna" style="width: 80px;">
                            <figure id="icones">
                                <a href="lojas_crud.php?modo=buscar&id=<?php echo($rsregistros['cod_loja']) ?>"> <img src="icon/edit.png"> </a>
                                
                                <a href="lojas_crud.php?ativo=<?php echo($rsregistros['ativo']) ?>&id=<?php echo($rsregistros['cod_loja']) ?>"> 
                                    <img src="<?php 
                                                    if($rsregistros['ativo'] == 0){ 
                                                        echo('icon/cancel.png'); } 
                                                    else { 
                                                        echo('icon/accept.png');}?>" >
                                </a>
                                
                                <a href="lojas_crud.php?modo=excluir&id=<?php echo($rsregistros['cod_loja'])?>" onclick="return confirm('Deseja realmente excluir essa loja?')"><img src="icon/trash.png"></a>
                            </figure>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </table>
            </div>
            
            <footer>
                <p> Desenvolvido por: Kailany Sousa da Gama</p>
            </footer>
        </div>

        <script src="js/mascaras.js"></script>
        <script src="../js/validar.js"></script>
        
        <script src="../js/jquery.js"></script>
    </body>
</html>