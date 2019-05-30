<?php 


    // ************************************************** INICIAR A VARIAVEL DE SESSÃO *******************************************************************************
    session_start();

    require_once("../bd/conexao.php");
    $conexao = conexaoMysql();

    $btn_modo = "Salvar";
    $nome = null;
    $email = null;
    $senha = null;
    $confirmacao = null;

    $cod_nivel = 0;

    if(isset($_GET['ativo'])){
        
        $nivel_ativo = $_GET['ativo'];
        $cod_usuario = $_GET['id'];

        $sql = "SELECT atbl_nivelusuario.ativo FROM tbl_usuario JOIN tbl_nivelusuario ON tbl_usuario.cod_nivel = tbl_nivelusuario.cod_nivel";
        $select = mysqli_query($conexao, $sql);

        $rsusuario = mysqli_fetch_array($select);

            if($rsusuario['ativo'] == 0){
                $usuario_ativo = 0;
                $sql = "UPDATE tbl_usuario SET ativo=".$usuario_ativo." WHERE cod_usuario=".$cod_usuario;
            } else {

                if($nivel_ativo == 1){
                    $usuario_ativo = 0;
                } else {
                    $usuario_ativo = 1;
                }

                $sql = "UPDATE tbl_usuario SET ativo=".$usuario_ativo." WHERE cod_usuario=".$cod_usuario;
            }
    
        
        mysqli_query($conexao, $sql);
    }

    if(isset($_GET['modo'])){
        
        $modo = $_GET['modo'];
        $cod_usuario = $_GET['id'];
        
        $_SESSION['cod_usuario'] = $cod_usuario;
        
        
        if($modo == "excluir"){
        
            $sql = "DELETE FROM tbl_usuario WHERE cod_usuario=".$cod_usuario;
            
            mysqli_query($conexao, $sql);

            
        } else if ($modo == "buscar"){
            
            $sql = "SELECT * FROM tbl_usuario JOIN tbl_nivelusuario ON tbl_usuario.cod_nivel = tbl_nivelusuario.cod_nivel 
            WHERE cod_usuario=".$cod_usuario;
            
            $btn_modo = "Editar";
            
            $select = mysqli_query($conexao, $sql);
            
            if($rsregistros=mysqli_fetch_array($select)){
                $nome = $rsregistros['nome_usuario'];
                $email = $rsregistros['email_usuario'];
                $senha = $rsregistros['senha_usuario'];
                $cod_nivel = $rsregistros['cod_nivel'];
                $nivel = $rsregistros['nivel'];
            }
        }
    }

    if(isset($_POST['btn-cadastrar'])){
        
        $nome = $_POST['txt-nome'];
        $email = $_POST['txt-email'];

        $senha = $_POST['txt-senha'];
        $confirmacao = $_POST['txt-confirmacao-senha']; 

        $nivel_usuario = $_POST['slt-nivel-usuario'];
        $btn_modo = $_POST['btn-cadastrar'];
         
        if($_POST['btn-cadastrar'] == "Salvar"){

            if($senha != null){

                $senha = md5($senha);
                $confirmacao = md5($confirmacao);

                if($senha == $confirmacao){
                    $sql = "INSERT INTO tbl_usuario (nome_usuario, email_usuario, senha_usuario, cod_nivel) VALUES ('".$nome."', '".$email."', '".$senha."', ".$nivel_usuario.");";

                    if(mysqli_query($conexao, $sql)){
                        header("location:usuario_crud.php");
                    } else {
                        echo("<script> alert('Erro no cadastro') </script>");
                    }
             
                } else {
                    echo("<script> alert('Senhas não coincidem') </script>");
                }

            } else {
                echo("<script> alert('Os campos Senha e Confirmação de Senha são obrigatórios!') </script>");
            }
            
        }else if ($_POST['btn-cadastrar'] == "Editar"){

            if($senha != null){

                $senha = md5($senha);
                $confirmacao = md5($confirmacao);

                if($senha == $confirmacao){
                    $sql = "UPDATE tbl_usuario SET nome_usuario='".$nome."', email_usuario='".$email."', senha_usuario='".$senha."', cod_nivel=".$nivel_usuario." WHERE cod_usuario=".$_SESSION['cod_usuario'];
                }
        
            } else {
                $sql = "UPDATE tbl_usuario SET nome_usuario='".$nome."', email_usuario='".$email."', cod_nivel=".$nivel_usuario." WHERE cod_usuario=".$_SESSION['cod_usuario'];
            }

            if(mysqli_query($conexao, $sql)){
                header("location:usuario_crud.php");
            } else {
                echo("<script> alert('Erro no cadastro') </script>");
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
        <link rel="stylesheet" type="text/css" href="css/usuario_crud.css">
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
                <h2 id="titulo-crud"> Cadastro de Usuário </h2>
                
                <form name="frm-usuarios" method="post" action="usuario_crud.php">
                     <div id="cadastro-nivel">
                         
                         <div id="caixa-nome-usuario"> 
                            <p> Nome</p>
                            <input type="text" name="txt-nome" value="<?php echo($nome) ?>" required/> 
                         </div>
                         
                         <div id="caixa-email-usuario">
                            <p> Email </p>
                            <input type="email" name="txt-email" value="<?php echo($email) ?>" required/>
                         </div>
                         
                         <div class="caixa-senha">
                            <p> Senha </p>
                             <input type="password" name="txt-senha" value="">
                         </div>
                         
                         <div class="caixa-senha">
                            <p> Confirmação de Senha </p>
                             <input type="password" name="txt-confirmacao-senha" value="">
                         </div>
                         
                         <div id="caixa-nivel">
                            <p> Nivel do Usuário</p>
                             <select name="slt-nivel-usuario" required>

                                <?php 
                                
                                    if($modo == "buscar"){
                                ?> 
                                 
                                <option value="<?php echo($cod_nivel) ?>"> <?php echo($nivel) ?> </option>

                                <?php } else { ?>

                                <option value=""> Selecione </option>
                                 
                                 <?php 

                                    } 

                                    $sql="SELECT * FROM tbl_nivelusuario WHERE ativo=1;"; $select = mysqli_query($conexao,$sql);
                                    while($rsniveis=mysqli_fetch_array($select)){
                                 ?>
                                
                                <option value="<?php echo($rsniveis['cod_nivel'])?>"> <?php echo($rsniveis['nivel'])?> </option>
                                 <?php } ?>
                             </select>
                         </div>
                         
                         
              
                        <input id="btn-cadastrar" type="submit" name="btn-cadastrar" value="<?php echo($btn_modo) ?>"/>
                    </div>                    
                </form>
                
                <table id="registros">
                    <tr>
                        <td class="titulo-coluna"> Usuário </td>
                        <td class="titulo-coluna"> Email </td>
                        <td class="titulo-coluna" style="width: 200px;"> Nível </td>
                    </tr>

                <?php

                    $sql = "SELECT tbl_usuario.cod_usuario, tbl_usuario.nome_usuario, tbl_usuario.email_usuario, tbl_usuario.ativo, tbl_nivelusuario.nivel 
                    FROM tbl_usuario JOIN tbl_nivelusuario ON tbl_nivelusuario.cod_nivel = tbl_usuario.cod_nivel ORDER BY tbl_usuario.cod_usuario;";

                    $select = mysqli_query($conexao, $sql);
                
                    while($rsregistros=mysqli_fetch_array($select)){
                ?>
                    <tr> 
                        <td class="dados-coluna"><?php echo($rsregistros['nome_usuario']) ?></td>
                        <td class="dados-coluna"><?php echo($rsregistros['email_usuario']) ?></td>
                        <td class="dados-coluna"><?php echo($rsregistros['nivel']) ?></td>
                        <td class="dados-coluna" style="width:150px;">
                            <figure id="icones">
                                
                                <a href="usuario_crud.php?modo=buscar&id=<?php echo($rsregistros['cod_usuario']) ?>"> <img src="icon/edit.png" alt="Editar" title="Editar"> </a>
                                
                                <a href="usuario_crud.php?ativo=<?php echo($rsregistros['ativo']) ?>&id=<?php echo($rsregistros['cod_usuario']) ?>"> 
                                    <img src="<?php
                                        if($rsregistros['ativo'] == 0){
                                            $icon_ativo = "Usuário desativado";
                                            echo('icon/cancel.png');
                                        } else {
                                            $icon_ativo = "Usuário ativado";
                                            echo('icon/accept.png'); 
                                        }?>" alt="<?php echo($icon_ativo) ?>" title="<?php echo($icon_ativo) ?>" >
                                </a>
                                
                                <a href="usuario_crud.php?modo=excluir&id=<?php echo($rsregistros['cod_usuario'])?>" onclick="return confirm('Deseja realmente excluir esse nível?')"><img src="icon/trash.png" alt="Excluir" title="Excluir"></a>
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