<!doctype html>
<html lang="pt-br">
    <head>
        <title>
            Sobre
        </title>

        <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" type="text/css" href="css/sobre.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        
        <meta charset="utf-8">
    </head>
    <body>
        <header>
            <?php require_once("menu.php")?>
        </header>
        
        <div id="caixa-conteudo" class="center">
            
            <div id="conteudo"> 
                <div id="titulo" class="center"> <h1>Acme Tunes</h1></div>
                <div class="img-sobre" style="margin-left: 165px;">
                    
                    <div class="titulo-sobre">
                        História
                    </div>
                    <div class="icones-sobre" style="background-image:url(img/hourglass.png);"></div>
                    <div class="textos"> 
						<p> Em 2012 alugou um ponto comercial, inaugurando a primeira loja Acme Tunes.</p>
					</div>
                    
                </div>
                <div class="img-sobre">
                    <div class="titulo-sobre">
                        Objetivo
                    </div>
                    <div class="icones-sobre" style="background-image:url(img/goal.png);"></div>
                    <div class="textos"> 
						<p>Agregar inovação e credibilidade aos produtos e serviços oferecidos aos clientes. </p>
					</div>
                </div>
                <div class="img-sobre">
                    <div class="titulo-sobre">
                        Valores
                    </div>
                    <div class="icones-sobre" style="background-image:url(img/diamond.png);"></div>
                    <div class="textos"> 
                        <p> Qualidade, comprometimento, segurança, prazos, experiências, transparência e inovação.</p>
					</div>
                </div>
                 <div class="img-sobre">
                     <div class="titulo-sobre">
                        Premiações
                    </div>
                    <div class="icones-sobre" style="background-image:url(img/trophy.png);"></div>
                     <div class="textos"> 
                        <p>Considerada a melhor locadora com mais avaliações positivas.</p>
					</div>
                </div>
            </div>
        </div>
        <footer>
           <?php require_once("footer.php") ?>
        </footer>

    </body>
</html>