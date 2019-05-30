<?php 

if (!isset($_SESSION)) {
    session_start();
}

    if(isset($_SESSION['email']) && isset($_SESSION['senha'])){

        $nome_usuario = $_SESSION['nome'];
        $email_usuario = $_SESSION['email'];
        $senha_usuario = $_SESSION['senha'];

        if(isset($_GET['logout']) && $_GET['logout'] == 1){

            session_destroy();
            header("location: ../index.php");

        }

    } else {
        echo("<script> alert('É necessário fazer o login!') </script>");
        echo("<script> window.location.href = '../index.php' </script>");
    }


?>

<div id="titulo-logo">
                    <h2 id="titulo-cms"> Sistema de Gerenciamento Acme Tunes </h2>
                    <figure id="img-logo">
                        <img src="icon/website.png">
                    </figure>
                </div>
                
                <div id="opcoes">
                    <div class="opcoes-cms">
                        <a href="adm_conteudo.php">
                            <figure  class="center">
                                <img src="icon/ui-design.png">
                            </figure>
                            <p>Adm. Conteúdo</p>
                        </a> 
                    </div>
                    <div class="opcoes-cms">
                        <a href="adm_contato.php">
                            <figure class="center">
                                <img src="icon/feedback.png">
                            </figure>
                            <p>Adm. Contato</p>
                        </a>
                    </div>
                    <div class="opcoes-cms">
                    <a href="adm_produto.php">
                            <figure class="center">
                                <img src="icon/box.png">
                            </figure>
                            <p>Adm. Produtos</p>
                        </a>
                    </div>
                    <div class="opcoes-cms">
                        <a href="adm_usuario.php">
                            <figure class="center">
                                <img src="icon/group.png">
                            </figure>
                            <p>Adm. Usuários</p>
                        </a>
                    </div>
                    
                    <div id="login">
                        <p id="login-usuario"> Bem vindo, <?php echo($nome_usuario) ?>! </p>
                        
                        <a href="index.php?logout=1"><div id="sair"> Logout </div></a>
                    </div>
                </div>