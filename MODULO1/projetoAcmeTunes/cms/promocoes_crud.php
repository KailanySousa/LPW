<?php 

    if (!isset($_SESSION)) {
        session_start();
    }

    require_once("../bd/conexao.php");
    $conexao = conexaoMysql();

    $btn_modo = "Salvar";
    $percentual = "";
    $cod_filme = 0;


    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        $cod_promocao = $_GET['id'];
        
        if($modo == "excluir"){
            
            $sql = "DELETE FROM tbl_promocao WHERE cod_promocao=".$cod_promocao;
            
            mysqli_query($conexao, $sql);
            
            header('location:promocoes_crud.php');

        } else if ($modo == "buscar"){

            $_SESSION['cod_promocao'] = $cod_promocao;

            $sql = "SELECT * FROM tbl_promocao JOIN tbl_filme ON tbl_filme.cod_filme = tbl_promocao.cod_filme WHERE cod_promocao=".$cod_promocao;
            $select = mysqli_query($conexao, $sql);

            $rspromocoes = mysqli_fetch_array($select);
            $cod_filme = $rspromocoes['cod_filme'];
            $percentual = $rspromocoes['percentual_desconto'];
            $filme = $rspromocoes['nome_filme'];

            $btn_modo = "Editar";

        }
    }

    if(isset($_GET['ativo'])){
        
        $promocao_ativo = $_GET['ativo'];
        $cod_promocao = $_GET['id'];
        
        if( $promocao_ativo == 0){
            
            $sql = "SELECT * FROM tbl_promocao WHERE ativo=1;";
            $select = mysqli_query($conexao, $sql);
            $rsativos=mysqli_fetch_array($select);
            $promocao_ativo = 1;
            
        } else if ($promocao_ativo == 1){
            $promocao_ativo = 0;
        }
        
        $sql = "UPDATE tbl_promocao SET ativo=".$promocao_ativo." WHERE cod_promocao=".$cod_promocao;
        
        mysqli_query($conexao, $sql);
    }

    if(isset($_POST['btn-cadastrar'])){
        
        $desconto = $_POST['txt-desconto'];
        $cod_filme = $_POST['slt-filmes'];

        if($_POST['btn-cadastrar'] == "Salvar"){
            
            $sql = "INSERT INTO tbl_promocao (percentual_desconto, cod_filme) VALUES ('".$desconto."', ".$cod_filme.");";
            
        }else if ($_POST['btn-cadastrar'] == "Editar"){
        
            $sql = "UPDATE tbl_promocao SET percentual_desconto='".$desconto."', cod_filme=".$cod_filme." WHERE cod_promocao=".$_SESSION['cod_promocao'];

        
        }
        
        if(mysqli_query($conexao, $sql)){
            header("location:promocoes_crud.php");
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
        <link rel="stylesheet" type="text/css" href="css/promocoes_crud.css">
        
        <meta charset="utf-8">
        
    </head>
    <body>
        <div id="container"> 
            <div id="modal-registro" class="center">

            </div>
        </div>
        <div id="caixa-cms" class="center">
            <header>
                <?php require_once("menu.php") ?>
            </header>
            
            
            <div id="caixa-conteudo"> 
                <h2 id="titulo-crud"> Cadastro Promoções </h2>
                
                <div id="cadastro-promocoes">
                    <form name="frm-promocoes" action="promocoes_crud.php" method="post">
                    
                        <div id="caixa-filme">
                            <p>Filme</p>
                            <select name="slt-filmes" required>

                                <?php 
                                
                                    if($modo == "buscar"){
                                ?>
                                <option value="<?php echo($cod_filme) ?>"> <?php echo($filme) ?> </option>
                                <?php } else { ?>
                                <option value=""> Selecione um filme </option>

                                <?php 

                                    }
                                
                                    $sql = "SELECT * FROM tbl_promocao right JOIN tbl_filme 
                                    ON tbl_promocao.cod_filme = tbl_filme.cod_filme 
                                    WHERE tbl_promocao.cod_filme is null AND tbl_filme.ativo = 1";
                                    $select = mysqli_query($conexao, $sql);
                                    
                                    while($rsfilmes = mysqli_fetch_array($select)){
                                ?>

                                <option value="<?php echo($rsfilmes['cod_filme']) ?>"> <?php echo($rsfilmes['nome_filme']) ?> </option>

                                <?php } ?>
                            </select>
                        </div>

                        <div id="caixa-percentual">
                            <p> Desconto</p>
                            <input type="text" name="txt-desconto" id="percentual" value="<?php echo($percentual) ?>" required onkeypress="return validarNumero(event);"/>  % 
                        </div>
                        
                        
                        <input id="btn-cadastrar" type="submit" name="btn-cadastrar" value="<?php echo($btn_modo) ?>"/>
                        
                    </form>
                </div>
                
                <table id="registros">
                    <tr>
                        <td class="titulo-coluna"> Filme </td>
                        <td class="titulo-coluna" style="width: 350px;"> Preço s/ Desconto </td>
                        <td class="titulo-coluna" style="width: 150px;"> Percentual </td>
                        <td class="titulo-coluna" style="width: 150px;"> Preço c/ Desconto </td>
                    </tr>

                <?php

                    $sql = "SELECT tbl_filme.cod_filme, tbl_filme.nome_filme, tbl_filme.preco, 
                    tbl_promocao.percentual_desconto, tbl_promocao.ativo, tbl_promocao.cod_promocao FROM tbl_filme
                    JOIN tbl_promocao ON tbl_filme.cod_filme = tbl_promocao.cod_filme;";

                    $select = mysqli_query($conexao, $sql);
                
                    while($rsregistros=mysqli_fetch_array($select)){

                        $nome = $rsregistros['nome_filme'];

                        //percentual cadastrado em %
                        $percentual = $rsregistros['percentual_desconto'];

                        // preco sem desconto
                        $preco_antigo = $rsregistros['preco'];

                        require_once("funcoes/calcularDesconto.php");

                        $preco_desconto = calcularDesconto($percentual, $preco_antigo);
                        
                ?>
                    <tr> 
                        <td class="dados-coluna"><?php echo($nome) ?></td>
                        <td class="dados-coluna"><?php echo("R$ " . $preco_antigo) ?></td>
                        <td class="dados-coluna"><?php echo($percentual . "%") ?></td>
                        <td class="dados-coluna"><?php echo("R$ " . $preco_desconto) ?></td>
                        
                        <td class="dados-coluna" style="width: 110px;">
                            <figure id="icones">
                                <a href="promocoes_crud.php?modo=buscar&id=<?php echo($rsregistros['cod_promocao'])?>">
                                    <img class="view-registro" src="icon/edit.png">
                                </a>

                                <a href="promocoes_crud.php?ativo=<?php echo($rsregistros['ativo'])?>&id=<?php echo($rsregistros['cod_promocao'])?>">
                                    
                                    <?php 
                                        if($rsregistros['ativo'] == 0){
                                            $icone_ativo = "icon/cancel.png";
                                        } else {
                                            $icone_ativo = "icon/accept.png";
                                        }
                                    ?>
                                    
                                    <img src="<?php echo($icone_ativo) ?>"> 
                                </a>
                                
                                <a href="promocoes_crud.php?modo=excluir&id=<?php echo($rsregistros['cod_promocao'])?>">
                                    <img src="icon/trash.png" onclick="return confirm('Deseja realmente excluir esse registro?')"> 
                                </a>
                                
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