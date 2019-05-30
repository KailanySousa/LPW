<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS
        </title>
        
        <link rel="stylesheet" type="text/css" href="css/cms.css">
        <meta charset="utf-8">
    
    </head>
    <body>
        <div id="caixa-cms" class="center">
            <header>
                <?php require_once("menu.php") ?>
            </header>
            
            <div id="caixa-conteudo"> 
                
                <div class="subopcoes">
                    <figure> <img src="icon/group.png"> </figure>
                    <a href="usuario_crud.php"><p> Usuários </p></a>
                </div>
                
                <div class="subopcoes">
                    <figure> <img src="icon/login-manager.png"> </figure>
                    <a href="niveis_crud.php"><p> Níveis de Autenticação </p></a>
                </div>
            </div>
            
            <footer>
                <p> Desenvolvido por: Kailany Sousa da Gama</p>
            </footer>
        </div>
    </body>
</html>