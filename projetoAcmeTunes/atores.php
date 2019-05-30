<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Atores
        </title>

        <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" type="text/css" href="css/atores.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css'>
		<link rel="stylesheet" href="css/style.css">
        <script src="js/jquery.js"></script>
        <meta charset="utf-8">
        
        <script>
            
            $(document).ready(function(){
                 $(".filmografia").click(function(){
                  $("#container-filmografia").toggle(400);
               });
            })
            function visualizarFilmografia(idItem){
                $.ajax({
                    type: "GET", //"POST"
                    url: "modal_filmografia.php",
                    data: {codigo: idItem},
                    success: function(dados){
                        $("#modal-filmografia").html(dados); //dados tem o conteúdo da pagina modal
                    }
                    
                });
            }  
            
        </script>

    </head>
    <body>
        <header>
            <?php require_once("menu.php")?>
        </header>
        <div id="container-filmografia">
             <div id="modal-filmografia" class="center"></div>
        </div>
        
        <div id="caixa-conteudo" class="center">
             <div id="slider">
                <div class="swiper-container main-slider loading">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style=" background-image: url(img/sandra-bullock.jpg);">
                        <img src="img/sandra-bullock.jpg" alt="" title="" class="entity-img" />
                      </figure>
                      <div class="content">
                        <p class="title">Sandra Bullock</p>
                        <span class="caption"></span>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image: url(img/jennifer-aniston.jpg);">
                        <img src="img/jennifer-aniston.jpg" alt="" title="" class="entity-img" />
                      </figure>
                      <div class="content">
                        <p class="title">Jennifer Aniston</p>
                        <span class="caption"></span>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image: url(img/tom-cruise.jpg);">
                        <img src="img/tom-cruise.jpg" alt="" title="" class="entity-img" />
                      </figure>
                      <div class="content">
                        <p class="title">Tom Cruise</p>
                        <span class="caption"></span>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image: url(img/jolie.jpg);">
                        <img src="img/jolie.jpg" alt="" title=""  class="entity-img" />
                      </figure>
                      <div class="content">
                        <p class="title">Angelina Jolie</p>
                        <span class="caption"></span>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image: url(img/dwayne.jpg);">
                        <img src="img/dwayne.jpg" alt="" title="" class="entity-img" />
                      </figure>
                      <div class="content">
                        <p class="title">Dwayne Johnson</p>
                        <span class="caption"></span>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image: url(img/eddie.jpg);">
                        <img src="img/eddie.jpg" alt="" title="" class="entity-img" />
                      </figure>
                      <div class="content">
                        <p class="title">Eddie Murphy</p>
                        <span class="caption"></span>
                      </div>
                    </div>
                  </div>
                  <!-- If we need navigation buttons -->
                  <div class="swiper-button-prev swiper-button-white"></div>
                  <div class="swiper-button-next swiper-button-white"></div>
                </div>

                    <!-- Thumbnail navigation -->
                <div class="swiper-container nav-slider loading">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image: url(img/sandra-bullock.jpg);">
                        <img src="img/sandra-bullock.jpg" class="entity-img" alt="" title="" />
                      </figure>
                      <div class="content">
                        <p class="title">Sandra Bullock</p>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image: url(img/jennifer-aniston.jpg);">
                        <img src="img/jennifer-aniston.jpg" class="entity-img" alt="" title="" />
                      </figure>
                      <div class="content">
                        <p class="title">Jennifer Aniston</p>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image: url(img/tom-cruise.jpg);">
                        <img src="img/tom-cruise.jpg" class="entity-img" alt="" title="" />
                      </figure>
                      <div class="content">
                        <p class="title">Tom Cruise</p>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image: url(img/jolie.jpg);">
                        <img src="img/jolie.jpg" class="entity-img" alt="" title="" />
                      </figure>
                      <div class="content">
                        <p class="title">Angelina Jolie</p>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image: url(img/dwayne.jpg);">
                        <img src="img/dwayne.jpg" class="entity-img" alt="" title="" />
                      </figure>
                      <div class="content">
                        <p class="title">Dwayne Johnson</p>
                      </div>
                    </div>
                    <div class="swiper-slide">
                      <figure class="slide-bgimg" style="background-image: url(img/eddie.jpg);">
                        <img src="img/eddie.jpg" class="entity-img" alt="" title="" />
                      </figure>
                      <div class="content">
                        <p class="title">Eddie Murphy</p>
                      </div>
                    </div>
                  </div>
                </div>
                 <div id="redes-socias">
                    <div class="icones center" style="background-image: url(img/facebook.png);"></div>
                    <div class="icones center" style="background-image: url(img/instagram.png);"></div>
                    <div class="icones center" style="background-image: url(img/twitter.png);"></div>
                </div>
            </div>
            <div id="conteudo"> 
                <div id="caixa-ator-destaque" class="center">
                    <div id="ator-destaque">
                        <div id="titulo-destaque"> <h1> Sanda Bullock </h1> </div>
                        <div id="informacoes-ator">
                            <p class="info-atores"> Nome </p>
                            <p class="informacoes">Sandra Annette Bullock</p>
                            <p class="info-atores"> Data de Nascimento </p>
                            <p class="informacoes">26 de julho de 1964</p>
                            <p class="info-atores"> Nacionalidade </p>
                            <p class="informacoes"> Condado de Arlington, Virgínia, EUA</p>
                            <p class="info-atores"> Atividades </p>
                            <p class="informacoes">Atriz, produtora de cinema</p>
                        </div>
                        
                        <figure id="img-ator-destaque">
                            <img src="img/sandra-bullock.jpg" alt="" title="">
                        </figure>
                        
                        <div id="detalhes-ator-destaque">
                            
                            <div class="itens-detalhes filmografia" onclick="visualizarFilmografia(<?php echo(1)?>)"> Filmografia
                                <p> Clique para ver </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div id="caixa-atores">
                    <h2 id="titulo-atores"> Outros atores e atrizes</h2>
                    <div id="atores">
                        <div class="imagens-atores">
                            
                              <div class="atores">
                                <figure class="img-atores">
                                  <img src="img/jdepp.jpg" alt="" title="">
                                </figure>
                                <div class="texto-atores">
                                  <h2 class="nome-ator"> Jhonny Depp</h2>
                                    <p class="info-atores"> Nome </p>
                                    <p class="informacoes">John Christopher Depp II</p>
                                    <p class="info-atores"> Data de Nascimento </p>
                                    <p class="informacoes">9 de Junho de 1963</p>
                                    <p class="info-atores"> Nacionalidade </p>
                                    <p class="informacoes"> Owensboro, Kentucky</p>
                                    <p class="info-atores"> Atividades </p>
                                    <p class="informacoes">Ator, músico, produtor e cineasta</p>
                                </div>
                              </div>
                            
                               <div class="atores">
                                <figure class="img-atores">
                                  <img src="img/jennifer-aniston.jpg" alt="" title="">
                                </figure>
                                   
                                   <div class="texto-atores">
                                  <h2 class="nome-ator"> Jennifer Aniston</h2>
                                    <p class="info-atores"> Nome </p>
                                    <p class="informacoes">Jennifer Joanna Aniston</p>
                                    <p class="info-atores"> Data de Nascimento </p>
                                    <p class="informacoes">11 de Fevereiro de 1969</p>
                                    <p class="info-atores"> Nacionalidade </p>
                                    <p class="informacoes"> Sherman Oaks, Califórnia</p>
                                    <p class="info-atores"> Atividades </p>
                                    <p class="informacoes">Atriz</p>
                                </div>
                              </div>
                            
                             <div class="atores">
                                <figure class="img-atores">
                                  <img src="img/gerald.jpg" alt="" title="">
                                </figure>
                                <div class="texto-atores">
                                  <h2 class="nome-ator"> Gerard Butler</h2>
                                    <p class="info-atores"> Nome </p>
                                    <p class="informacoes">Gerard James Butler</p>
                                    <p class="info-atores"> Data de Nascimento </p>
                                    <p class="informacoes">13 de Novembro de 1969</p>
                                    <p class="info-atores"> Nacionalidade </p>
                                    <p class="informacoes"> Paisley, Escócia</p>
                                    <p class="info-atores"> Atividades </p>
                                    <p class="informacoes">Ator, Produtor, Cantor, Ex-Advogado</p>
                                </div>
                              </div>
                            
                              <div class="atores">
                                <figure class="img-atores">
                                  <img src="img/kelly.jpg" alt="" title="">
                                </figure>
                                <div class="texto-atores">
                                  <h2 class="nome-ator"> Kelly Overton</h2>
                                    <p class="info-atores"> Nome </p>
                                    <p class="informacoes">Kelly Overton</p>
                                    <p class="info-atores"> Data de Nascimento </p>
                                    <p class="informacoes">28 de Agosto de 1978</p>
                                    <p class="info-atores"> Nacionalidade </p>
                                    <p class="informacoes">Wilbraham, Massachusetts</p>
                                    <p class="info-atores"> Atividades </p>
                                    <p class="informacoes">Atriz, Roteirista, Diretora e Produtora</p>
                                </div>
                              </div>
                        </div>

                        <div class="imagens-atores">
                              <div class="atores">
                                <figure class="img-atores">
                                  <img src="img/lana-parrilla.jpg" alt="" title="">
                                </figure>
                                <div class="texto-atores">
                                  <h2 class="nome-ator"> ...</h2>
                                    <p class="info-atores"> Nome </p>
                                    <p class="informacoes">...</p>
                                    <p class="info-atores"> Data de Nascimento </p>
                                    <p class="informacoes">...</p>
                                    <p class="info-atores"> Nacionalidade </p>
                                    <p class="informacoes"> ...</p>
                                    <p class="info-atores"> Atividades </p>
                                    <p class="informacoes">...</p>
                                </div>
                              </div>
                            
                              <div class="atores">
                                <figure class="img-atores">
                                  <img src="img/josh.jpg" alt="" title="">
                                </figure>
                                <div class="texto-atores">
                                  <h2 class="nome-ator"> ...</h2>
                                    <p class="info-atores"> Nome </p>
                                    <p class="informacoes">...</p>
                                    <p class="info-atores"> Data de Nascimento </p>
                                    <p class="informacoes">...</p>
                                    <p class="info-atores"> Nacionalidade </p>
                                    <p class="informacoes"> ...</p>
                                    <p class="info-atores"> Atividades </p>
                                    <p class="informacoes">...</p>
                                </div>
                              </div>
                            
                              <div class="atores">
                                <figure class="img-atores">
                                  <img src="img/jennifer-morrison.jpg" alt="" title="">
                                </figure>
                                <div class="texto-atores">
                                  <h2 class="nome-ator"> ...</h2>
                                    <p class="info-atores"> Nome </p>
                                    <p class="informacoes">...</p>
                                    <p class="info-atores"> Data de Nascimento </p>
                                    <p class="informacoes">...</p>
                                    <p class="info-atores"> Nacionalidade </p>
                                    <p class="informacoes"> ...</p>
                                    <p class="info-atores"> Atividades </p>
                                    <p class="informacoes">...</p>
                                </div>
                              </div>
                            
                              <div class="atores">
                                <figure class="img-atores">
                                  <img src="img/tyler.jpg" alt="" title="">
                                </figure>
                                <div class="texto-atores">
                                  <h2 class="nome-ator"> ...</h2>
                                    <p class="info-atores"> Nome </p>
                                    <p class="informacoes">...</p>
                                    <p class="info-atores"> Data de Nascimento </p>
                                    <p class="informacoes">...</p>
                                    <p class="info-atores"> Nacionalidade </p>
                                    <p class="informacoes">...</p>
                                    <p class="info-atores"> Atividades </p>
                                    <p class="informacoes">...</p>
                                </div>
                              </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <footer>
           <?php require_once("footer.php") ?>
        </footer>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js'></script>
        <script src="js/index.js"></script>
    </body>
</html>