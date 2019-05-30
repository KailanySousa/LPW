<?php 

    session_start();

    require_once("bd/conexao.php");
    $conexao = conexaoMysql();

    if(isset($_POST['btn_entrar'])){

        $usuario = $_POST['txt_usuario'];
        $senha = $_POST['txt_senha'];

       
        $senha = md5($senha);

        $sql = "SELECT * FROM tbl_usuario WHERE email_usuario='".$usuario."' AND senha_usuario='".$senha."' AND ativo=1";

        $select = mysqli_query($conexao, $sql);

        if($rsusuario = mysqli_fetch_Array($select)){

            $_SESSION['email'] = $rsusuario['email_usuario'];
            $_SESSION['senha'] =$rsusuario['senha_usuario'];
            $_SESSION['nome'] = $rsusuario['nome_usuario'];

    

           echo("<script> window.location.href = 'cms/index.php' </script>");
        } else {
           echo("<script> alert('Email ou senha incorretos') </script>");
        }


    }


?>

<div id="caixa-cabecalho" class="center">
                <div id="logo">
                    <div id="imagem-logo"> </div>
                    <div id="nome"> Acme Tunes </div>
                </div>
                <nav id="menu">
                     <a href="index.php"><div class="menu-itens"> Home </div></a>
                    <div class="menu-itens"> Destaques
                        <div class="submenu"> 
                            <a href="promocao.php"><div class="submenu-itens"> Promoções </div></a>
                            <a href="filme_mes.php"><div class="submenu-itens"> Filme do Mês </div></a>
                        </div>
                    </div>
                    <a href="atores.php"><div class="menu-itens"> Atores</div></a>
                    <div class="menu-itens"> A Acme
                        <div class="submenu"> 
                            <a href="lojas.php"><div class="submenu-itens"> Lojas </div></a>
                            <a href="sobre.php"><div class="submenu-itens"> Sobre </div></a>
                            <a href="fale_conosco.php"><div class="submenu-itens"> Contato</div></a>
                        </div>
                    </div>
                </nav>
                <div id="login">
                    <form name="frm_login" method="post" action=""> 
                        <div class="caixa-login">
                            <p class="lbl-login"> Usuário: </p>
                            <input class="txt-login" type="text" name="txt_usuario" value=""/>
                        </div>

                        <div class="caixa-login">
                            <p class="lbl-login"> Senha: </p>
                            <input class="txt-login" type="password" name="txt_senha" value=""/>
                        </div>

                        <input id="btn-entrar" type="submit" name="btn_entrar" value="Entrar"/>
                    </form>
                </div>
            </div>
