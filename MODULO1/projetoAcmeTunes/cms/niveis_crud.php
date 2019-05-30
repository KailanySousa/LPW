<?php 

    
    // ************************************************** INICIAR A VARIAVEL DE SESSÃO *******************************************************************************
    session_start();

    require_once("../bd/conexao.php");
    $conexao = conexaoMysql();

    $nivel = null;
    $btn_modo = "Salvar";

    if(isset($_GET['ativo'])){
        
        $nivel_ativo = $_GET['ativo'];
        $cod_nivel = $_GET['id'];
        
        if($nivel_ativo == 0){
            $nivel_ativo = 1;

            $sql = "UPDATE tbl_usuario, tbl_nivelusuario SET tbl_usuario.ativo= 1, tbl_nivelusuario.ativo=".$nivel_ativo." WHERE tbl_nivelusuario.cod_nivel=".$cod_nivel;
                
        } else if ($nivel_ativo == 1){
            $nivel_ativo = 0;

            $sql = "UPDATE tbl_usuario, tbl_nivelusuario SET tbl_usuario.ativo= 0, tbl_nivelusuario.ativo=".$nivel_ativo." WHERE tbl_nivelusuario.cod_nivel=".$cod_nivel;
        }
        
       
        
        mysqli_query($conexao, $sql);
    }

    if(isset($_GET['modo'])){
        
        $modo = $_GET['modo'];
        $cod_nivel = $_GET['id'];
        
        $_SESSION['cod_nivel'] = $cod_nivel;
        
        
        if($modo == "excluir"){
        
            $sql = "DELETE FROM tbl_nivelusuario WHERE cod_nivel=".$cod_nivel;
            
            mysqli_query($conexao, $sql);

            
        } else if ($modo == "buscar"){
            
            $sql = "SELECT * FROM tbl_nivelusuario WHERE cod_nivel=".$cod_nivel;
            
            $btn_modo = "Editar";
            
            $select = mysqli_query($conexao, $sql);
            
            if($rsregistros=mysqli_fetch_array($select)){
                $nivel = $rsregistros['nivel'];
            }
        }
    }

    if(isset($_POST['btn-cadastrar'])){
        
        $nivel = $_POST['txt-nome'];
        
        if($_POST['btn-cadastrar'] == "Salvar"){
            
            $sql = "INSERT INTO tbl_nivelusuario (nivel) VALUES ('".$nivel."')";
            
        } else if ($_POST['btn-cadastrar'] == "Editar"){
            
            $sql = "UPDATE tbl_nivelusuario SET nivel='".$nivel."' WHERE cod_nivel=".$_SESSION['cod_nivel'];
            
        }
        
        if(mysqli_query($conexao, $sql)){
            header("location:niveis_crud.php");
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
        <link rel="stylesheet" type="text/css" href="css/niveis_crud.css">
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
                <h2 id="titulo-crud"> Cadastro Nivel de Usuário </h2>
                
                <form name="frm-niveis" method="post" action="niveis_crud.php">
                     <div id="cadastro-nivel">
                        <p> Nivel de Usuário</p>
                        <input type="text" name="txt-nome" value="<?php echo($nivel) ?>" required/>
                         
                        <input id="btn-cadastrar" type="submit" name="btn-cadastrar" value="<?php echo($btn_modo) ?>"/>
                    </div>                    
                </form>
                
                <table id="registros">
                    <tr>
                        <td class="titulo-coluna"> Nivel de Usuário </td>
                    </tr>

                <?php

                    $sql = "SELECT * FROM tbl_nivelusuario";

                    $select = mysqli_query($conexao, $sql);
                
                    while($rsregistros=mysqli_fetch_array($select)){
                ?>
                    <tr> 
                        <td class="dados-coluna"><?php echo($rsregistros['nivel']) ?></td>
                        <td class="dados-coluna" style="width:90px;">
                            <figure id="icones">
                                
                                <a href="niveis_crud.php?modo=buscar&id=<?php echo($rsregistros['cod_nivel']) ?>"> <img src="icon/edit.png"> </a>
                                
                                <a href="niveis_crud.php?ativo=<?php echo($rsregistros['ativo']) ?>&id=<?php echo($rsregistros['cod_nivel']) ?>"> 
                                    <img src="<?php
                    if($rsregistros['ativo'] == 0){
                        echo('icon/cancel.png');
                    } else {
                       echo('icon/accept.png'); 
                    }?>" >
                                </a>
                                
                                <a href="niveis_crud.php?modo=excluir&id=<?php echo($rsregistros['cod_nivel'])?>" onclick="return confirm('Deseja realmente excluir esse nível?')"><img src="icon/trash.png"></a>
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
    </body>
</html>