<!doctype html>
<html lang="pt-br">
    <head>
        <title>
            Home
        </title>

        <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/slider.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css'>
        <link rel="stylesheet" href="css/style.css">
        
        <meta charset="utf-8">
    </head>
    <body>
        <header>
            <?php require_once("menu.php") ?>
        </header>
        
        <div id="caixa-conteudo" class="center">
            <div id="slider">
                  <?php require_once("slider.php") ?>
            </div>

            <div id="conteudo"> 
                <?php  require_once("itens_lateral.php") ?>
                
                <div id="caixa-produtos"> 
                    <div class="produtos"> 
                        <div class="produtos-itens"> 
                            <div class="imagem-produto center"> 
                                <img src="img/hora_pesadelo.jpg" alt="" title=""> 
                            </div>
                            <div class="info-produto center">
                                <p class="info"> Nome: A hora do pesadelo</p> 
                                <p class="info"> Descrição: </p>
                                <p class="info"> Preço: </p>
                            </div>
                            <div class="detalhes-produto center"> Detalhes</div>
                        </div>
                        <div class="produtos-itens"> 
                            <div class="imagem-produto center"> 
                                <img src="img/bob.jpg" alt="" title=""> 
                            </div>
                            <div class="info-produto center">
                                <p class="info"> Nome: Bob Esponja - O Filme</p> 
                                <p class="info"> Descrição: </p>
                                <p class="info"> Preço: </p>
                            </div>
                            <div class="detalhes-produto center"> Detalhes</div>
                        </div>
                        <div class="produtos-itens"> 
                            <div class="imagem-produto center"> 
                                <img src="img/cacador_recompensas.jpg" alt="" title=""> 
                            </div>
                            <div class="info-produto center">
                                <p class="info"> Nome: Caçador de Recompensas</p> 
                                <p class="info"> Descrição: </p>
                                <p class="info"> Preço: </p>
                            </div>
                            <div class="detalhes-produto center"> Detalhes</div>
                        </div>
                    </div>
                    <div class="produtos">
                        <div class="produtos-itens"> 
                            <div class="imagem-produto center">
                                <img src="img/coraline.jpg" alt="" title=""> 
                            </div>
                            <div class="info-produto center">
                                <p class="info"> Nome:</p> 
                                <p class="info"> Descrição: </p>
                                <p class="info"> Preço: </p>
                            </div>
                            <div class="detalhes-produto center"> Detalhes</div>
                        </div>
                        <div class="produtos-itens">
                            <div class="imagem-produto center">
                                <img src="img/chamada_emergencia.jpeg" alt="" title=""> 
                            </div>
                            <div class="info-produto center">
                                <p class="info"> Nome:</p> 
                                <p class="info"> Descrição: </p>
                                <p class="info"> Preço: </p>
                            </div>
                            <div class="detalhes-produto center"> Detalhes</div>
                        </div>
                        <div class="produtos-itens"> 
                            <div class="imagem-produto center"> 
                                <img src="img/sempre_lado.jpg" alt="" title=""> 
                            </div>
                            <div class="info-produto center">
                                <p class="info"> Nome: Sempre ao seu lado</p> 
                                <p class="info"> Descrição: </p>
                                <p class="info"> Preço: R$20,90 </p>
                            </div>
                            <div class="detalhes-produto center"> Detalhes</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="center">
           <?php require_once("footer.php") ?>
        </footer>
         <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js'></script>
        <script src="js/index.js"></script>

    </body>
</html>