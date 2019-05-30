<?php 

    //verifica se a variavel de sessão já foi iniciada
    if (!isset($_SESSION)) {
        session_start();
    }

    require_once("../bd/conexao.php");
    $conexao = conexaoMysql();

    //variaveis padrão
    $genero = "";
    $btn_modo = "Salvar";	

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        $cod_genero = $_GET['id'];
        
        $_SESSION['cod_genero'] = $cod_genero;
        
        //se variavel modo for igual a excluir, será feito uma exclusão no banco
        if($modo == "excluir"){

            $sql = "DELETE FROM tbl_filme_genero WHERE cod_genero=".$cod_genero;
            
            $sql = "DELETE FROM tbl_genero WHERE cod_genero=".$cod_genero;

            mysqli_query($conexao, $sql);
            
            header('location:cadastro_generos.php');

        //se variavel modo for igual a buscar, será feito uma busca no banco
       } else if ($modo == "buscar"){
           
           $btn_modo = "Editar";
           
           $sql = "select * from tbl_genero WHERE cod_genero=".$cod_genero;
           
           $select = mysqli_query($conexao, $sql);
           
           if($rsgenero=mysqli_fetch_array($select)){
                $genero = $rsgenero['genero'];
           }
        }
    }

     //CADASTRO DE GENERO
     if(isset($_POST['btn-cadastrar-genero'])){
        
        $genero = $_POST['txt-genero'];

        //verifica se o botão é igual a salvar para que seja salvo um novo registro
        if($_POST['btn-cadastrar-genero'] == "Salvar"){

            $sql = "INSERT INTO tbl_genero (genero) VALUES ('".$genero."')";
        
            mysqli_query($conexao, $sql);

        // verifica se o botão é igual a editar para que seja feito uma atualizaçao
        } else if($_POST['btn-cadastrar-genero'] == "Editar"){

            $sql = "UPDATE tbl_genero SET genero='".$genero."' WHERE cod_genero=".$_SESSION['cod_genero'];
        
            mysqli_query($conexao, $sql);

        }
        
        header('location:cadastro_generos.php');
    }

  
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS
        </title>
        
        <link rel="stylesheet" type="text/css" href="css/cms.css">
        <link rel="stylesheet" type="text/css" href="css/atores_crud.css">
        <script src="../js/jquery.js"></script>
        
        <meta charset="utf-8">
        
    </head>
    <body>
        <div id="caixa-cms" class="center">
            <header>
                <?php require_once("menu.php") ?>
            </header>
            
    
            <div id="caixa-conteudo"> 
                <div id="caixa-menu-lateral">
                    <a href="produtos_crud.php"><div class="itens-menu"> Filmes </div></a>
                </div>

                <div id="cadastro-pais">
                    <form name="frm-genero" method="post" action="cadastro_generos.php">
                        <div class="caixa-atividade-pais"> 
                            <p> Genero </p>
                            <input type="text" name="txt-genero" value="<?php echo($genero) ?>" required onkeypress="return validarLetra(event);"/>
                            </div>
                        
                        <input class="btn-cadastrar" type="submit" name="btn-cadastrar-genero" value="<?php echo($btn_modo) ?>" style="width: 266px;"/>

                    </form>
                </div>
                   
                
                <table id="registros" style="width: 310px; margin-left: 280px;">
                    <tr>
                        <td class="titulo-coluna"> Gênero </td>
                    </tr>

                <?php

                    //select na tabela de genero para exibir os registro cadastrados
                    $sql = "SELECT * FROM tbl_genero";

                    $select = mysqli_query($conexao, $sql);    
                
                    while($rsregistros=mysqli_fetch_array($select)){
                ?>
                    <tr> 
                        <td class="dados-coluna"><?php echo($rsregistros['genero']) ?></td>
                        <td class="dados-coluna">
                            <figure id="icones">
                                <a href="cadastro_generos.php?modo=buscar&id=<?php echo($rsregistros['cod_genero']) ?>"> <img src="icon/edit.png" alt="Editar" title="Editar"> </a>
                                
                                <a href="cadastro_generos.php?modo=excluir&id=<?php echo($rsregistros['cod_genero'])?>" onclick="return confirm('Deseja realmente excluir esse registro?')"><img src="icon/trash.png" alt="Excluir" title="Excluir"></a>
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
        <script src="../js/validar.js"> </script>
    </body>
</html>