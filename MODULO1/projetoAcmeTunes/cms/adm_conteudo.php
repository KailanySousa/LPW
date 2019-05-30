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
                    <figure> <img src="icon/sale.png"> </figure>
                    <a href="promocoes_crud.php"><p> Promoções </p> </a>
                </div>
                
                <div class="subopcoes">
                    <figure> <img src="icon/movie.png"> </figure>
                    <a href="filme_mes_crud.php"><p> Filme do Mês </p></a>
                </div>
                
                 <div class="subopcoes">
                    <figure> <img src="icon/actor.png"> </figure>
                    <a href="atores_crud.php"><p> Atores </p></a>
                </div>
                
                <div class="subopcoes">
                    <figure> <img src="icon/hourglass.png"> </figure>
                    <a href="sobre_crud.php"><p> Sobre </p></a>
                </div>
            
                <div class="subopcoes">
                    <figure> <img src="icon/location.png"> </figure>
                    <a href="lojas_crud.php"><p> Nossas Lojas </p></a>
                </div>
            </div>
            
            <footer>
                <p> Desenvolvido por: Kailany Sousa da Gama</p>
            </footer>
        </div>
    </body>
</html>