<!doctype html>
<html lang="pt-br">
    <head>
        <title>
            Filme do Mês
        </title>

        <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" type="text/css" href="css/filme_mes.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css'>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/rate.css">

        <meta charset="utf-8">
    </head>
    <body>
        <header>
            <?php require_once("menu.php") ?>
        </header>
        
        <div id="caixa-conteudo" class="center">
            <div id="slider">
                  <?php require_once("slider.php") ?>
                 <div id="redes-socias">
                    <div class="icones center" style="background-image: url(img/facebook.png);"></div>
                    <div class="icones center" style="background-image: url(img/instagram.png);"></div>
                    <div class="icones center" style="background-image: url(img/twitter.png);"></div>
                </div>
            </div>
            <div id="conteudo">  
                <div id="caixa-filme" class="center"> 
                    <figure id="img-filme"> <img src="img/bob.jpg" alt="" title=""> </figure>
                    <div id="detalhes-filme">
                        <div id="titulo-filme">
                            <h1>Bob Esponja - O filme</h1>
                        </div>
                        
                        <div id="avaliacao">
                            <div id="estrelas"> 
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                            <div id="favorito"> </div>
                        </div>
                        
                        <div id="genero"> <h2>Aventura</h2> </div>
                        
                        <div id="info-filme">
                            <div id="classificacao"><img src="img/classificacao_livre.jpg" alt="" title=""></div>
                            <div id="ano"><span style="font-family:cursive">2017</span></div>
                            <div id="pais">Estados Unidos</div>
                            <div id="duracao">120 minutos</div>
                            <div class="opcoes-filme" id="dublabo"> Dublado </div>
                            <div class="opcoes-filme" id="legendado"> Legendado </div>
                            <div class="opcoes-filme" id="hd"> HD </div>
                        </div>
                        
                        <div id="diretor"> Diretor: </div>
                        <div id="atores"> Atores: </div>
                        
                        <div id="sinopse">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</p>
                        </div>
                    </div>
                    <div id="preco" class="center">
                        <div class="aluguel-compra"> Aluge por R$9,99</div>
                        <div class="aluguel-compra" style="width:225px;"> Compre por R$19,99</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="caixa-trailer">
            <div id="trailer" class="center">
             <video controls src="https://www.youtube.com/embed/Agqr8987-DA"></video>
            </div>
        </div>
        <footer class="center">
           <?php require_once("footer.php") ?>
        </footer>
       
 <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js'></script>

        <script  src="js/index.js"></script>
    </body>
</html>