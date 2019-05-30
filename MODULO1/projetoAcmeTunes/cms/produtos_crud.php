<?php 

    session_start();

    require_once("../bd/conexao.php");
    $conexao = conexaoMysql();

    $titulo = "";
    $lancamento = "";
    $sinopse = "";
    $trailer = "";
    $preco = "";
    $duracao = "";
    $filme_mes = "";
    $pais = "";
    $classificacao = "Livre";

    $filme_mes = 0;
    $cod_pais = 0;
    $cod_classificacao = 1;

    $btn_modo = "Salvar";	

    $filme_mes_ativo = "selected";
    $filme_mes_desativo = "selected";

    $filme_dublado_sim = "selected";
    $filme_dublado_nao = "selected";

    $filme_legendado_sim = "selected";
    $filme_legendado_nao = "selected";

    $nota_1 = "";
    $nota_2 = "";
    $nota_3 = "";
    $nota_4 = "";
    $nota_5 = "";

    $nome_diretor = "";

    
    if(isset($_GET['filme_mes'])){
        
        $filme_mes = $_GET['filme_mes'];
        $cod_filme = $_GET['id'];
        
        if($filme_mes == 0){

            $sql ="SELECT COUNT(filme_mes) AS quantidade_filme_mes FROM tbl_filme WHERE filme_mes=1";
            $select = mysqli_query($conexao, $sql);

            $rsfilme_mes = mysqli_fetch_array($select);
            $quantidade_filme_mes = $rsfilme_mes['quantidade_filme_mes'];

            if($quantidade_filme_mes >= 1){

                $sql="UPDATE tbl_filme SET filme_mes=0";
                mysqli_query($conexao, $sql);

                $filme_mes = 1;
            } else {
                $filme_mes = 1;
            }
        
                
        } else if ($filme_mes == 1){

            $sql="UPDATE tbl_filme SET filme_mes=0";
            mysqli_query($conexao, $sql);

            $filme_mes = 1;
            

        }
        
        $sql = "UPDATE tbl_filme SET filme_mes=".$filme_mes." WHERE cod_filme=".$cod_filme;
        
        mysqli_query($conexao, $sql);
    }


    if(isset($_GET['ativo'])){
        
        $filme_ativo = $_GET['ativo'];
        $cod_filme = $_GET['id'];
        
        if($filme_ativo == 0){
            $filme_ativo = 1;
                
        } else if ($filme_ativo == 1){
            $filme_ativo = 0;
        }
        
        $sql = "UPDATE tbl_filme SET ativo=".$filme_ativo." WHERE cod_filme=".$cod_filme;
        
        mysqli_query($conexao, $sql);
    }
    

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        $cod_filme = $_GET['id'];
        
        $_SESSION['cod_filme'] = $cod_filme;
        
        if($modo == "excluir"){

            $imagem = $_GET['foto'];

            $sql = "DELETE FROM tbl_promocao WHERE cod_filme=".$cod_filme;

            mysqli_query($conexao, $sql);

            $sql = "DELETE FROM tbl_filme_diretor WHERE cod_filme=".$cod_filme;

            mysqli_query($conexao, $sql);

            $sql = "DELETE FROM tbl_filme_ator WHERE cod_filme=".$cod_filme;

            mysqli_query($conexao, $sql);

            $sql = "DELETE FROM tbl_filme_genero WHERE cod_filme=".$cod_filme;

            mysqli_query($conexao, $sql);
            
            $sql = "DELETE FROM tbl_filme WHERE cod_filme=".$cod_filme;
           
            mysqli_query($conexao, $sql);

            $imagem = "../img_filmes/".$imagem;
            unlink($imagem);
            header('location:produtos_crud.php');


       } else if ($modo == "buscar"){
           
           $btn_modo = "Editar";
           
           $sql = "SELECT * FROM tbl_filme JOIN tbl_classificacao ON tbl_classificacao.cod_classificacao = tbl_filme.cod_classificacao
           JOIN tbl_pais ON tbl_pais.cod_pais = tbl_filme.cod_pais
            WHERE cod_filme=".$cod_filme;
           
           $select = mysqli_query($conexao, $sql);
           
           if($rsfilme=mysqli_fetch_array($select)){
                $titulo = $rsfilme['nome_filme'];
                $lancamento = $rsfilme['ano_lancamento'];

                $imagem = $rsfilme['imagem_filme'];
                $_SESSION['nome_foto'] = $imagem;

                $sinopse = $rsfilme['sinopse'];
                $trailer = $rsfilme['trailer'];
                $preco = $rsfilme['preco'];
                $duracao = $rsfilme['duracao_filme'];
                $filme_mes = $rsfilme['filme_mes'];

                if($filme_mes == 1){
                    $filme_mes_ativo = "selected";
                } else {
                    $filme_mes_desativo = "selected";
                }

                $avaliacao = $rsfilme['avaliacao'];

                if($avaliacao == 1){
                    $nota_1 = "checked";
                } else if($avaliacao == 2){
                    $nota_2 = "checked";
                } else if($avaliacao == 3){
                    $nota_3 = "checked";
                } else if($avaliacao == 4){
                    $nota_4 = "checked";
                } else if($avaliacao == 5){
                    $nota_5 = "checked";
                }

                $cod_classificacao = $rsfilme['cod_classificacao'];
                $classificacao = $rsfilme['classificacao'];
                $cod_pais = $rsfilme['cod_pais'];
                $pais = $rsfilme['pais'];
           }
        }
    }

    //CADASTRO NA TABELA RELACIONAMENTO DE ATORES E FILMES
    if(isset($_POST['btn-cadastrar-filme-ator'])){
        
        $cod_ator = $_POST['slt-ator'];
        $cod_filme = $_POST['slt-filme'];
        
        $sql = "INSERT INTO tbl_filme_ator (cod_ator, cod_filme) VALUES (".$cod_ator.", ".$cod_filme.")";
        
        mysqli_query($conexao, $sql);
    }

    //CADASTRO NA TABELA RELACIONAMENTO DE DIRETOR E FILMES
    if(isset($_POST['btn-cadastrar-filme-diretor'])){
        
        $cod_diretor = $_POST['slt-diretor'];
        $cod_filme = $_POST['slt-filme'];
        
        $sql = "INSERT INTO tbl_filme_diretor (cod_diretor, cod_filme) VALUES (".$cod_diretor.", ".$cod_filme.")";
        
        mysqli_query($conexao, $sql);
    }

    
    //CADASTRO NA TABELA RELACIONAMENTO DE GENEROS E FILMES
    if(isset($_POST['btn-cadastrar-filme-genero'])){
        
        $cod_genero = $_POST['slt-genero'];
        $cod_filme = $_POST['slt-filme'];
        
        $sql = "INSERT INTO tbl_filme_genero (cod_genero, cod_filme) VALUES (".$cod_genero.", ".$cod_filme.")";
        
        mysqli_query($conexao, $sql);
    }

    //CADASTRO DE PRODUTOS
    if(isset($_POST['btn-cadastrar-filme'])){
        
        $titulo = $_POST['txt-titulo'];
        $lancamento = $_POST['txt-lancamento'];
        $cod_classificacao = $_POST['sle-classificacao'];
        $sinopse = $_POST['txt-sinopse'];
        $trailer = $_POST['txt-trailer'];
        $preco = $_POST['txt-preco'];
        $duracao = $_POST['txt-duracao'];
        $cod_pais = $_POST['sle-pais'];
        $cod_dublado = $_POST['sle-dublado'];
        $cod_legendado = $_POST['sle-legendado'];
        $avaliacao = $_POST['rate'];

        if($_POST['btn-cadastrar-filme'] == "Salvar"){

            if(isset($_SESSION['path_foto'])){
                //INSERÇÃO NA TABELA DE FILMES
                $sql = "INSERT INTO tbl_filme (nome_filme, imagem_filme, ano_lancamento, duracao_filme, sinopse, cod_classificacao, trailer, preco,  dublado, legendado, cod_pais, avaliacao) 
                VALUES ('".$titulo."', '".$_SESSION['path_foto']."', '".$lancamento."', '".$duracao."', '".$sinopse."', ".$cod_classificacao.", '".$trailer."', '".$preco."', ".$cod_dublado.", ".$cod_legendado.", ".$cod_pais.", ".$avaliacao.");";

                mysqli_query($conexao, $sql);
            } else {
                echo("<script> alert('Por favor, escolha uma foto') </script>");
            }

           
 
            
        } else if ($_POST['btn-cadastrar-filme'] == "Editar"){
            
            if(isset($_SESSION['path_foto']) && $_SESSION['path_foto'] != null){

                //ATUALIZAR REGISTRO NA TABELA DE FILME
                $sql = "UPDATE tbl_filme SET nome_filme='".$titulo."', imagem_filme='".$_SESSION['path_foto']."', 
                ano_lancamento='".$lancamento."', duracao_filme='".$duracao."', sinopse='".$sinopse."', 
                cod_classificacao=".$cod_classificacao.", trailer='".$trailer."', preco='".$preco."', filme_mes=".$filme_mes.", 
                cod_pais=".$cod_pais.", dublado=".$cod_dublado.", legendado=".$cod_legendado.", avaliacao=".$avaliacao." WHERE cod_filme=".$_SESSION['cod_filme'];

                //echo($sql);

                if(mysqli_query($conexao, $sql)){

                    unlink('../img_filmes/'.$_SESSION['nome_foto']);

                    $_SESSION['nome_foto'] = "";
                    $_SESSION['path_foto'] = "";

                    header("location:produtos_crud.php");
                }

            } else {

                $sql = "UPDATE tbl_filme SET nome_filme='".$titulo."', ano_lancamento='".$lancamento."', duracao_filme='".$duracao."', sinopse='".$sinopse."', 
                cod_classificacao=".$cod_classificacao.", trailer='".$trailer."', preco='".$preco."', filme_mes=".$filme_mes.", 
                cod_pais=".$cod_pais.", dublado=".$cod_dublado.", legendado=".$cod_legendado.", avaliacao=".$avaliacao." WHERE cod_filme=".$_SESSION['cod_filme'];
            
                //echo($sql);

                mysqli_query($conexao, $sql);
                header("location:produtos_crud.php");
            }

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
        <link rel="stylesheet" type="text/css" href="css/produtos_crud.css">
        <script src="../js/validar.js"> </script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/jquery.form.js"></script>
        <link rel="stylesheet" href="../css/rate.css">
        

        
        <script type="text/javascript">
            $(document).ready(function() {
                $("#cadastro-produtos").hide();
                $("#cadastro-diretores").hide();
                $("#cadastro-filme-diretores").hide();
                $("#cadastro-filme-atores").hide();
                $("#cadastro-filme-generos").hide();
                $("#produtos").click(MostrarCadastroFilme);
                $("#diretores").click(MostrarCadastroDiretores);
                $("#filme-diretores").click(MostrarCadastroFilmeDiretores);
                $("#filme-atores").click(MostrarCadastroFilmeAtores);
                $("#filme-generos").click(MostrarCadastroFilmeGeneros);

                $('#fle-foto').live('change', function(){
                    $('#frm-foto').ajaxForm({
                        target: "#imagem"
                    }).submit();
                })

                });
 
            function MostrarCadastroFilme(){
                $("#cadastro-produtos").toggle();
            }
            function MostrarCadastroDiretores(){
                $("#cadastro-diretores").toggle();
            }
			function Editarprodutos(){
				$("#cadastro-produtos").show();
			}
            
            function MostrarCadastroFilmeDiretores(){
				$("#cadastro-filme-diretores").toggle();
			}

            function MostrarCadastroFilmeAtores(){
				$("#cadastro-filme-atores").toggle();
			}

            function MostrarCadastroFilmeGeneros(){
				$("#cadastro-filme-generos").toggle();
			}

        </script>
		
		<?php 
		
			if(isset($_GET['modo'])){
				
				$modo = $_GET['modo'];
		
				if($modo == "buscar"){
					echo("<script type='text/javascript'>
				$(document).ready(function() {
					$('#cadastro-produtos').show();
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
                <h2 id="titulo-crud"> Produtos </h2>

                <div id="caixa-menu-lateral">
                    <a href="cadastro_diretores.php"><div class="itens-menu"> Diretores </div></a>
                    <a href="atores_crud.php"><div class="itens-menu"> Atores </div></a>
                    <a href="cadastro_generos.php"><div class="itens-menu"> Gêneros </div></a>
                    <a href="cadastro_pais.php"><div class="itens-menu"> País </div></a>
                </div>
                
                <div id="caixa-menu">
                    <div class="menu">
                        <p class="titulo-menu" id="produtos"> Cadastrar Filmes</p>
                        
                            <div id="cadastro-produtos">
                                <form id="frm-foto" name="frm-foto" action="upload.php" method="post"  enctype="multipart/form-data">

                                    <div id="caixa-imagem">
                                        <input type="file" name="fle-foto" id="fle-foto">

                                        <div id="imagem"> 
            
                                            <?php if(isset($imagem)){
                                                echo("<img src='../img_filmes/".$imagem."' >");
                                            }
                                            
                                            ?>
                                        
                                        </div>
                                    </div>  
                                
                                </form>

                                <form name="frm-produtos" method="post" action="produtos_crud.php">
                                    <div id="caixa-titulo"> 
                                        <p> Titulo</p>
                                        <input type="text" name="txt-titulo" value="<?php echo($titulo)?>" required onkeypress="return validarLetra(event)"/>
                                    </div>

                                    <div id="caixa-titulo"> 
                                        <p> Preço</p>
                                        <input type="text" name="txt-preco" id="txt-preco" value="<?php echo($preco)?>" required onkeypress="return mascPreco(event);" />
                                    </div>

                                    <div id="caixa-titulo"> 
                                        <p> Duração </p>
                                        <input type="text" name="txt-duracao" value="<?php echo($duracao)?>" required/>
                                    </div>

                                    <div id="caixa-lancamento">
                                        <p> Ano Lançamento</p>
                                        <input type="text" name="txt-lancamento" id="txt-ano" value="<?php echo($lancamento)?>" required onkeypress="return mascAno(event);" />
                                     </div>

                                    <div class="caixa-destaque">
                                        <p> Classificação </p>
                                            <select name="sle-classificacao">
                                            <?php 
                                                if($modo == "buscar"){
                                            ?>
                                                <option value="<?php echo($cod_classificacao) ?>"> <?php echo($classificacao) ?> </option>
                                            <?php }else{ ?>
                                                <option value="<?php echo($cod_classificacao) ?>"> <?php echo($classificacao) ?> </option> 
                                            <?php 

                                                }
                                            
                                                $sql="SELECT * FROM tbl_classificacao WHERE cod_classificacao <>". $cod_classificacao;

                                                $select = mysqli_query($conexao, $sql);

                                                while($rsclassificacao = mysqli_fetch_array($select)){
                                            ?>
                                            <option value="<?php echo($rsclassificacao['cod_classificacao']) ?>"> <?php echo($rsclassificacao['classificacao']) ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                     <div id="caixa-sinopse"> 
                                        <p> Sinopse </p>
                                        <input type="text" name="txt-sinopse" value="<?php echo($sinopse)?>" required/>
                                     </div>

                                    <div id="caixa-sinopse"> 
                                        <p> Trailer </p>
                                        <input type="url" name="txt-trailer" value="<?php echo($trailer)?>" required/>
                                    </div>

                                    <div class="caixa-destaque">
                                        <p> Dublado </p>
                                        <select name="sle-dublado" required>
                                            <option value="1" <?php echo($filme_dublado_sim) ?>> Sim </option>
                                            <option value="0" <?php echo($filme_dublado_nao) ?>> Não </option>
                                        </select>
                                    </div>

                                    <div class="caixa-destaque">
                                        <p> Legendado </p>
                                        <select name="sle-legendado" required>
                                            <option value="1" <?php echo($filme_legendado_sim) ?>> Sim </option>
                                            <option value="0" <?php echo($filme_legendado_nao) ?>> Não </option>
                                        </select>
                                    </div>

                                    <div class="caixa-destaque">
                                        <p> País  </p>
                                        <select name="sle-pais" required>

                                        <?php 
                                            if($modo == "buscar"){
                                        ?>
                                            <option value="<?php echo($cod_pais) ?>"> <?php echo($pais) ?> </option>
                                        <?php }else{ ?>
                                            <option value=""> Selecione um país </option>
                                        <?php 

                                            }

                                            $sql ="SELECT * FROM tbl_pais WHERE cod_pais <>".$cod_pais;
                                            $select = mysqli_query($conexao, $sql);

                                            while($rspaises = mysqli_fetch_array($select)){
                                        ?>

                                            <option value="<?php echo($rspaises['cod_pais']) ?>"> <?php echo($rspaises['pais']) ?> </option>

                                        <?php } ?>
                                        </select>
                                    </div>

                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" <?php echo($nota_1) ?>/>
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" <?php echo($nota_2) ?>/>
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" <?php echo($nota_3) ?>/>
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" <?php echo($nota_4) ?>/>
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" <?php echo($nota_5) ?>/>
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                    
                                    <input class="btn-cadastrar" type="submit" name="btn-cadastrar-filme" value="<?php echo($btn_modo) ?>"/>
                                </form>
                            </div>
                        
                    </div>

                    <div class="menu">
                        <p class="titulo-menu" id="filme-diretores"> Cadastrar Diretores do Filme</p>
                        
                            <div id="cadastro-filme-diretores">

                                <form name="frm-diretores-filme" method="post" action="produtos_crud.php">
                                    <div class="caixa-filme-diretor"> 
                                        <p> Diretor</p>
                                        <select name="slt-diretor" required>
                                            <option value=""> Selecione um diretor...</option>

                                            <?php 
                                            
                                                $sql="SELECT * FROM tbl_diretor";

                                                $select = mysqli_query($conexao, $sql);

                                                while($rsdiretores = mysqli_fetch_array($select)){

                                            ?>
                                            <option value="<?php echo($rsdiretores['cod_diretor']) ?>"><?php echo($rsdiretores['nome_diretor']) ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="caixa-filme-diretor"> 
                                        <p> Filme</p>
                                        <select name="slt-filme" required>
                                            <option value=""> Selecione um pais...</option>

                                            <?php 
                                            
                                                $sql="SELECT * FROM tbl_filme";

                                                $select = mysqli_query($conexao, $sql);

                                                while($rsdiretores = mysqli_fetch_array($select)){

                                            ?>
                                            <option value="<?php echo($rsdiretores['cod_filme']) ?>"><?php echo($rsdiretores['nome_filme']) ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <input class="btn-cadastrar" type="submit" name="btn-cadastrar-filme-diretor" value="<?php echo($btn_modo) ?>"/>
                                </form>
                            </div>
                        
                    </div>


                    <div class="menu">
                        <p class="titulo-menu" id="filme-atores"> Cadastrar Atores do Filme</p>
                        
                            <div id="cadastro-filme-atores">

                                <form name="frm-atores-filme" method="post" action="produtos_crud.php">
                                    <div class="caixa-filme-diretor"> 
                                        <p> Ator</p>
                                        <select name="slt-ator" required>
                                            <option value=""> Selecione um ator...</option>

                                            <?php 
                                            
                                                $sql="SELECT * FROM tbl_ator";

                                                $select = mysqli_query($conexao, $sql);

                                                while($rsdiretores = mysqli_fetch_array($select)){

                                            ?>
                                            <option value="<?php echo($rsdiretores['cod_ator']) ?>"><?php echo($rsdiretores['nome_ator']) ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="caixa-filme-diretor"> 
                                        <p> Filme</p>
                                        <select name="slt-filme" required>
                                            <option value=""> Selecione um filme...</option>

                                            <?php 
                                            
                                                $sql="SELECT * FROM tbl_filme";

                                                $select = mysqli_query($conexao, $sql);

                                                while($rsdiretores = mysqli_fetch_array($select)){

                                            ?>
                                            <option value="<?php echo($rsdiretores['cod_filme']) ?>"><?php echo($rsdiretores['nome_filme']) ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <input class="btn-cadastrar" type="submit" name="btn-cadastrar-filme-ator" value="<?php echo($btn_modo) ?>"/>
                                </form>
                            </div>
                        
                    </div>

                    <div class="menu">
                        <p class="titulo-menu" id="filme-generos"> Cadastrar Gêneros do Filme</p>
                        
                            <div id="cadastro-filme-generos">

                                <form name="frm-generos-filme" method="post" action="produtos_crud.php">
                                    <div class="caixa-filme-diretor"> 
                                        <p> Gênero </p>
                                        <select name="slt-genero" required>
                                            <option value=""> Selecione um gênero...</option>

                                            <?php 
                                            
                                                $sql="SELECT * FROM tbl_genero";

                                                $select = mysqli_query($conexao, $sql);

                                                while($rsgeneros = mysqli_fetch_array($select)){

                                            ?>
                                            <option value="<?php echo($rsgeneros['cod_genero']) ?>"><?php echo($rsgeneros['genero']) ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="caixa-filme-diretor"> 
                                        <p> Filme</p>
                                        <select name="slt-filme" required>
                                            <option value=""> Selecione um filme...</option>

                                            <?php 
                                            
                                                $sql="SELECT * FROM tbl_filme";

                                                $select = mysqli_query($conexao, $sql);

                                                while($rsdiretores = mysqli_fetch_array($select)){

                                            ?>
                                            <option value="<?php echo($rsdiretores['cod_filme']) ?>"><?php echo($rsdiretores['nome_filme']) ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <input class="btn-cadastrar" type="submit" name="btn-cadastrar-filme-genero" value="<?php echo($btn_modo) ?>"/>
                                </form>
                            </div>
                        
                    </div>
                </div>
                
                <table id="registros">
                    <tr>
                        <td class="titulo-coluna"> Titulo </td>
                        <td class="titulo-coluna"> Ano Lançamento </td>
                        <td class="titulo-coluna"> Imagem </td>
                        <td style="text-align: center"> </td>
                        
                    </tr>

                <?php

                    $sql = "SELECT * FROM tbl_filme";

                    $select = mysqli_query($conexao, $sql);    
                
                    while($rsregistros=mysqli_fetch_array($select)){
                ?>
                    <tr> 
                        <td class="dados-coluna"><?php echo($rsregistros['nome_filme']) ?></td>
                        <td class="dados-coluna"><?php echo($rsregistros['ano_lancamento']) ?></td>
                        <td class="dados-coluna" style="width: 150px;"><img src="../img_filmes/<?php echo($rsregistros['imagem_filme']) ?>"> 
                        <td class="dados-coluna">
                            <figure id="icones">
                                <a href="produtos_crud.php?modo=buscar&id=<?php echo($rsregistros['cod_filme']) ?>" id="editar-produtos"> <img src="icon/edit.png" alt="Editar" title="Editar"> </a>
                                
                                <a href="produtos_crud.php?ativo=<?php echo($rsregistros['ativo']) ?>&id=<?php echo($rsregistros['cod_filme']) ?>"> 
                                    <img src="<?php 
                                                    if($rsregistros['ativo'] == 0){ 
                                                        $icon_ativo = "filme desativado";
                                                        echo('icon/cancel.png'); } 
                                                    else { 
                                                        $icon_ativo = "filme ativado";
                                                        echo('icon/accept.png');}?>" alt="<?php echo($icon_ativo) ?>" title="<?php echo($icon_ativo) ?>" >
                                </a>

                                <a href="produtos_crud.php?filme_mes=<?php echo($rsregistros['filme_mes']) ?>&id=<?php echo($rsregistros['cod_filme']) ?>"> 
                                    <img style="margin-left: 4px;" src="<?php 
                                                    if($rsregistros['filme_mes'] == 0){ 
                                                        $icon_filme_mes = "filme em destaque desativado";
                                                        echo('icon/no_destaque.png'); } 
                                                    else { 
                                                        $icon_filme_mes = "filme em destaque ativado";
                                                        echo('icon/destaque.png');}?>" alt="<?php echo($icon_filme_mes) ?>" title="<?php echo($icon_filme_mes) ?>" >
                                </a>
                                
                                <a href="produtos_crud.php?modo=excluir&id=<?php echo($rsregistros['cod_filme'])?>&foto=<?php echo($rsregistros['imagem_filme'])?>" onclick="return confirm('Deseja realmente excluir esse registro?')"><img src="icon/trash.png" alt="Excluir" title="Excluir"></a>
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
    </body>
</html>