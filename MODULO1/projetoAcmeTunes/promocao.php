<?php 

    require_once("bd/conexao.php");
    $conexao = conexaoMysql();

?>
<!doctype html>
<html lang="pt-br">
    <head>
        <title>
            Promoções
        </title>

        <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" type="text/css" href="css/promocao.css">
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
            <?php require_once("menu.php")?>
        </header>
        
        <div id="caixa-conteudo" class="center">
             <div id="slider">
                  
             <div class="swiper-container main-slider loading">
                    
                    <div class="swiper-wrapper">
                        <?php 
                        
                            $sql = "SELECT tbl_filme.nome_filme, tbl_filme.imagem_filme FROM tbl_promocao JOIN tbl_filme ON tbl_promocao.cod_filme = tbl_filme.cod_filme 
                            WHERE tbl_promocao.ativo = 1 ORDER BY tbl_promocao.cod_promocao DESC LIMIT 6 ";
                        
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
                        <!-- TODOS OS FILMES COM PREÇO ANTIGO E NOVO -->

                        <?php 
                        
                            $sql="SELECT tbl_filme.nome_filme, tbl_filme.imagem_filme, tbl_filme.preco, 
                            tbl_promocao.percentual_desconto, tbl_filme.ativo FROM tbl_filme
                            JOIN tbl_promocao ON tbl_filme.cod_filme = tbl_promocao.cod_filme WHERE tbl_promocao.ativo = 1;";
                        
                            $select = mysqli_query($conexao, $sql);

                            while($rspromocoes = mysqli_fetch_array($select)){

                                $nome = $rspromocoes['nome_filme'];
                                $imagem = $rspromocoes['imagem_filme'];

                                //percentual cadastrado em %
                                $percentual = $rspromocoes['percentual_desconto'];

                                // preco sem desconto
                                $preco = $rspromocoes['preco'];

                                require_once("cms/funcoes/calcularDesconto.php");

                                $preco_desconto = calcularDesconto($percentual, $preco);
                        ?>
                        <div class="produtos-itens"> 
                            <figure class="imagem-produto center"> 
                                <img src="img_filmes/<?php echo($imagem) ?>" alt="<?php echo($nome) ?>" title="<?php echo($nome) ?>"> 
                            </figure>
                            <div class="info-produto center">
                                <p class="nome-filme"> <?php echo($nome) ?> </p>
                                
                                <div class="precos center">
                                    <p class="preco-de"> De: R$ <?php echo($preco) ?></p>
                                    <p class="preco-por"> Por: R$ <?php echo($preco_desconto) ?></p>
                                    <!-- <div class="btn-comprar"> Comprar </div> -->
                                </div>
                            </div>
                        </div>

                        <?php } ?>
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