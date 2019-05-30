<!doctype html>
<html lang="pt-br">
    <head>
        <title>
            Home
        </title>

        <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/itens_lateral.css">
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
            <div class="swiper-container main-slider loading">
                    
                    <div class="swiper-wrapper">
                        <?php 
                        
                            $sql = "SELECT * FROM tbl_filme WHERE ativo=1;";
                        
                            $select = mysqli_query($conexao, $sql);
            
                            while($rspromocoes = mysqli_fetch_array($select)){
                        ?>
                        
                        <div class="swiper-slide">
                          <figure class="slide-bgimg" style=" background-image: url(img_filmes/<?php echo($rspromocoes['imagem_filme'])?>);">
                            <img src="img_filmes/<?php echo($rspromocoes['imagem_filme'])?>" alt="" title="" class="entity-img" />
                          </figure>
                          <div class="content">
                            <p class="title"><?php echo($rspromocoes['nome_filme'])?></p>
                            <span class="caption"></span>
                          </div>
                        </div>
                       
                    <?php } ?>
                    </div>
                
                </div>
                  <!-- If we need navigation buttons -->
                  <div class="swiper-button-prev swiper-button-white"></div>
                  <div class="swiper-button-next swiper-button-white"></div>
                
                   <div class="swiper-container nav-slider loading">
                  <div class="swiper-wrapper">
                      
                      
                      <?php 
                        
                            $sql = "SELECT tbl_filme.nome_filme, tbl_filme.imagem_filme FROM tbl_promocao JOIN tbl_filme ON tbl_promocao.cod_filme = tbl_filme.cod_filme 
                            WHERE tbl_promocao.ativo = 1 ORDER BY tbl_promocao.cod_promocao DESC LIMIT 6 ";
                        
                            $select = mysqli_query($conexao, $sql);
            
                            while($rspromocoes = mysqli_fetch_array($select)){
                        ?>
                      
                      
                      
                    <div class="swiper-slide">
                        <figure class="slide-bgimg" style="background-image: url(img_filmes/<?php echo($rspromocoes['imagem_filme'])?>);">
                            <img src="img_filmes/<?php echo($rspromocoes['imagem_filme'])?>" class="entity-img" alt="<?php echo($rspromocoes['nome_filme']) ?>" title="<?php echo($rspromocoes['nome_filme']) ?>" />
                        </figure>
                        <div class="content">
                            <p class="title"><?php echo($rspromocoes['nome_filme']) ?></p>
                        </div>
                    </div>
                      
                      <?php } ?>
                      
                       </div>
                    
                </div>
                 <div id="redes-socias">
                    <div class="icones center" style="background-image: url(img/facebook.png);"></div>
                    <div class="icones center" style="background-image: url(img/instagram.png);"></div>
                    <div class="icones center" style="background-image: url(img/twitter.png);"></div>
                </div>
            </div>

            <div id="conteudo"> 
                <?php  require_once("itens_lateral.php") ?>
                
                <div id="caixa-produtos"> 
                   
             
                    <div class="produtos"> 
                    <?php 
                   
                        $sql = "SELECT * FROM tbl_filme WHERE ativo = 1;";
                        $select = mysqli_query($conexao, $sql);

                        while($rsfilmes = mysqli_fetch_array($select)){
                    ?>
                        <div class="produtos-itens"> 
                            <figure class="imagem-produto center"> 
                                <img src="img_filmes/<?php echo($rsfilmes['imagem_filme']) ?>" alt="" title=""> 
                            </figure>
                            <div class="info-produto center">
                                <p class="info"> Nome: <?php echo($rsfilmes['nome_filme']) ?> </p> 
                                <p class="info"> Descrição: <?php echo($rsfilmes['sinopse']) ?></p>
                                <p class="info"> Preço: <?php echo($rsfilmes['preco']) ?></p>
                            </div>
                            <div class="detalhes-produto center"> Detalhes</div>
                        </div>
                    <?php } ?>
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