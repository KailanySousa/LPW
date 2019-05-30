<?php 

    require_once("bd/conexao.php");
    $conexao = conexaoMysql();

    $nota_1 = "";
    $nota_2 = "";
    $nota_3 = "";
    $nota_4 = "";
    $nota_5 = "";

    $cod_filme = "";
    $titulo = "";
    $imagem = "";
    $lancamento = "";
    $pais = "";
    $duracao = "";
    $sinopse = "";
    $preco = "";
    $dublado = "";
    $legendado = "";
    $avaliacao = "";
    $diretor = "";
    $atores = "";
    $preco = "";
    $trailer = "";
    $generos ="";
    $mensagem ="";

?>
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

        <style>
            #mensagem{
                width: inherit;
                height: 600px;
                background-color: black;
                position: absolute;
            }

            #mensagem p{
                width: inherit;
                text-align: center;
                font-size: 100px;
                font-family: fonte;
                margin-top: 190px;
            }
        </style>

        <meta charset="utf-8">
    </head>
    <body>
        <header>
            <?php require_once("menu.php") ?>
        </header>
        
        <div id="caixa-conteudo" class="center">

            <div id="redes-socias">
                <div class="icones center" style="background-image: url(img/facebook.png);"></div>
                <div class="icones center" style="background-image: url(img/instagram.png);"></div>
                <div class="icones center" style="background-image: url(img/twitter.png);"></div>
            </div>

            <div id="conteudo">  
                <div id="caixa-filme" class="center"> 
                

                    <?php 
                    
                        $sql="SELECT tbl_filme.cod_filme, tbl_filme.nome_filme, tbl_filme.imagem_filme, tbl_filme.ano_lancamento, tbl_pais.pais,
                            tbl_filme.duracao_filme, tbl_filme.sinopse, tbl_filme.preco, tbl_filme.trailer, tbl_filme.dublado, tbl_filme.legendado, tbl_filme.avaliacao, 
                            GROUP_CONCAT(DISTINCT tbl_genero.genero separator ', ') AS genero, GROUP_CONCAT(DISTINCT tbl_diretor.nome_diretor separator ', ')  AS diretor, 
                            GROUP_CONCAT(DISTINCT tbl_ator.nome_ator separator ', ') AS atores, tbl_classificacao.icone FROM tbl_filme JOIN tbl_pais ON tbl_filme.cod_pais = tbl_pais.cod_pais 
                            JOIN tbl_filme_diretor ON tbl_filme.cod_filme = tbl_filme_diretor.cod_filme
                            JOIN tbl_diretor ON tbl_filme_diretor.cod_diretor = tbl_diretor.cod_diretor 
                            JOIN tbl_filme_ator ON tbl_filme.cod_filme = tbl_filme_ator.cod_filme
                            JOIN tbl_ator ON tbl_filme_ator.cod_ator = tbl_ator.cod_ator
                            JOIN tbl_filme_genero ON tbl_filme.cod_filme = tbl_filme_genero.cod_filme
                            JOIN tbl_genero ON tbl_filme_genero.cod_genero = tbl_genero.cod_genero
                            JOIN tbl_classificacao ON tbl_filme.cod_classificacao = tbl_classificacao.cod_classificacao
                            WHERE filme_mes=1 AND tbl_filme.ativo = 1 GROUP BY tbl_filme.cod_filme";

                       

                        if($select = mysqli_query($conexao, $sql)){
                           if($rsfilmemes = mysqli_fetch_array($select)){
                            $cod_filme = $rsfilmemes['cod_filme'];
                            $titulo = $rsfilmemes['nome_filme'];
                            $imagem = $rsfilmemes['imagem_filme'];
                            $lancamento = $rsfilmemes['ano_lancamento'];
                            $pais = $rsfilmemes['pais'];
                            $duracao = $rsfilmemes['duracao_filme'];
                            $sinopse = $rsfilmemes['sinopse'];
                            $preco = $rsfilmemes['preco'];

                            $dublado = $rsfilmemes['dublado'];
                            $legendado = $rsfilmemes['legendado'];

                            $avaliacao = $rsfilmemes['avaliacao'];

                            $diretor = $rsfilmemes['diretor'];
                            $atores = $rsfilmemes['atores'];
                            $generos = $rsfilmemes['genero'];

                            $trailer = $rsfilmemes['trailer'];

                            $classificacao = $rsfilmemes['icone'];

                            if($avaliacao == 1){
                                $nota_1 = "checked";
                            } else if($avaliacao == 2){
                                $nota_2 = "checked";
                            } else if($avaliacao == 3){
                                $nota_3 = "checked";
                            } else if($avaliacao == 4){
                                $nota_4 = "checked";
                            } else if($avaliacao == 5){
                                $nota_5 = "checked";
                            }
                        }else {
                            $mensagem = "<div id='mensagem'> <p>Conteudo Indisponivel</p> </div>";
                        }

                        $sql = "SELECT * FROM tbl_promocao WHERE cod_filme=".$cod_filme;
                        
                        if(mysqli_query($conexao, $sql)){
                            $select = mysqli_query($conexao, $sql);

                            if($rsfilmemes = mysqli_fetch_array($select)){
                                $percentual = $rsfilmemes['percentual_desconto'];
                                
                                require_once("cms/funcoes/calcularDesconto.php");
                                $preco = calcularDesconto($percentual, $preco);
                            }
                        }
                        } 

                        
                    ?>

                    <?php echo($mensagem); ?>
                    <figure id="img-filme"> <img src="img_filmes/<?php echo($imagem) ?>" alt="" title=""> </figure>
                    <div id="detalhes-filme">
                        <div id="titulo-filme">
                            <h1><?php echo($titulo) ?></h1>
                        </div>
                        
                        <!-- INFORMAÇÕES DO FILME EM DESTAQUE -->
                        <div id="avaliacao">
                            <div id="estrelas"> 
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" <?php echo($nota_5) ?>/>
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" <?php echo($nota_4) ?>/>
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" <?php echo($nota_3) ?>/>
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" <?php echo($nota_2) ?>/>
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" <?php echo($nota_1) ?>/>
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                            <div id="favorito"> </div>
                        </div>
                        
                        <div id="genero"> <h2><?php echo($generos) ?></h2> </div>
                        
                        <div id="info-filme">
                            <div id="classificacao"><img src="<?php echo($classificacao) ?>" alt="" title=""></div>
                            <div id="ano"><?php echo($lancamento) ?></div>
                            <div id="pais"><?php echo($pais) ?></div>
                            <div id="duracao"><?php echo($duracao) ?></div>

                            <?php if($dublado == 1){ ?>

                            <div class="opcoes-filme" id="dublabo"> Dublado </div>

                            <?php 
                                } 
                                if($legendado == 1){
                            ?>
                            <div class="opcoes-filme" id="legendado"> Legendado </div>

                            <?php } ?>
                        </div>
                        
                        <div id="diretor"> Diretor: <?php echo($diretor) ?> </div>
                        <div id="atores"> Atores: <?php echo($atores) ?></div>
                        
                        <div id="sinopse">
                            <p><?php echo($sinopse) ?></p>
                        </div>
                    </div>
                    <div id="preco" class="center">
                        <div class="aluguel-compra" style="width:225px;"> Compre por R$<?php echo($preco) ?></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- TRAILER DO FILME -->
        <div id="caixa-trailer" style="background-image: url(img_filmes/<?php echo($imagem) ?>">
            <div id="trailer" class="center">
                <iframe width="560" height="315" src="<?php echo($trailer) ?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <footer class="center">
           <?php require_once("footer.php") ?>
        </footer>
       
 <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js'></script>

        <script  src="js/index.js"></script>
    </body>
</html>