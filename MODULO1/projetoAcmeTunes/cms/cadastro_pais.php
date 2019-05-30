<?php 

    if (!isset($_SESSION)) {
        session_start();
    }

    require_once("../bd/conexao.php");
    $conexao = conexaoMysql();

    $pais = "";

    $btn_modo = "Salvar";	

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        $cod_pais = $_GET['id'];
        
        $_SESSION['cod_pais'] = $cod_pais;
        
        if($modo == "excluir"){
            
            $sql = "DELETE FROM tbl_pais WHERE cod_pais=".$cod_pais;

            mysqli_query($conexao, $sql);
            
            header('location:cadastro_pais.php');

       } else if ($modo == "buscar"){
           
           $btn_modo = "Editar";
           
           $sql = "select * from tbl_pais WHERE cod_pais=".$cod_pais;
           
           $select = mysqli_query($conexao, $sql);
           
           if($rspais=mysqli_fetch_array($select)){
                $pais = $rspais['pais'];
                
           }
        }
    }

     //CADASTRO DE PAIS
     if(isset($_POST['btn-cadastrar-pais'])){
        
        $pais = $_POST['txt-pais'];

        if($_POST['btn-cadastrar-pais'] == "Salvar"){

            $sql = "INSERT INTO tbl_pais (pais) VALUES ('".$pais."')";
        
            mysqli_query($conexao, $sql);

        } else if($_POST['btn-cadastrar-pais'] == "Editar"){
            $sql = "UPDATE tbl_pais SET pais='".$pais."' WHERE cod_pais=".$_SESSION['cod_pais'];
        
            mysqli_query($conexao, $sql);
        }
        
        header('location:cadastro_pais.php');
        
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
                    <a href="atores_crud.php"><div class="itens-menu"> Atores </div></a>
                    <a href="produtos_crud.php"><div class="itens-menu"> Filmes </div></a>
                </div>

                <div id="cadastro-pais">
                    <form name="frm-pais" method="post" action="cadastro_pais.php">
                        <div class="caixa-atividade-pais"> 
                            <p> País </p>
                            <input type="text" name="txt-pais" value="<?php echo($pais) ?>" required onkeypress="return validarLetra(event);"/>
                            </div>
                        
                        <input class="btn-cadastrar" type="submit" name="btn-cadastrar-pais" value="<?php echo($btn_modo) ?>"  style="width: 266px;"/>

                    </form>
                </div>
                   
                
                <table id="registros" style="width: 310px; margin-left: 280px;">
                    <tr>
                        <td class="titulo-coluna"> País </td>
                    </tr>

                <?php

                    $sql = "SELECT * FROM tbl_pais";

                    $select = mysqli_query($conexao, $sql);    
                
                    while($rsregistros=mysqli_fetch_array($select)){
                ?>
                    <tr> 
                        <td class="dados-coluna"><?php echo($rsregistros['pais']) ?></td>
                        <td class="dados-coluna">
                            <figure id="icones">
                                <a href="cadastro_pais.php?modo=buscar&id=<?php echo($rsregistros['cod_pais']) ?>" id="editar-atores"> <img src="icon/edit.png" alt="Editar" title="Editar"> </a>
                                
                                <a href="cadastro_pais.php?modo=excluir&id=<?php echo($rsregistros['cod_pais'])?>" onclick="return confirm('Deseja realmente excluir esse registro?')"><img src="icon/trash.png" alt="Excluir" title="Excluir"></a>
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