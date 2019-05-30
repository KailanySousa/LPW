<?php 

    require_once("bd/conexao.php");
    $conexao = conexaoMysql();

    $nome = "";
    $nome_completo ="";
    $dt_nasc = "";
    $imagem = "";
    $pais = "";
    $atividade = "";

    if(isset($_GET['id'])){
        
        $cod_ator = $_GET['id'];
        
        $sql="SELECT tbl_ator.cod_ator, tbl_ator.nome_ator, tbl_ator.nome_completo_ator, tbl_ator.data_nascimento, tbl_ator.imagem_ator, 
        GROUP_CONCAT(tbl_atividade.atividade separator ', ') AS atividade, tbl_pais.pais FROM tbl_ator JOIN tbl_atividade_ator ON tbl_ator.cod_ator = tbl_atividade_ator.cod_ator
        JOIN tbl_atividade ON tbl_atividade_ator.cod_atividade = tbl_atividade.cod_atividade JOIN tbl_pais ON tbl_ator.cod_pais = tbl_pais.cod_pais
        WHERE tbl_ator.cod_ator=".$cod_ator;
        $select = mysqli_query($conexao, $sql);
        
        
    } else {
        
        $sql="SELECT tbl_ator.cod_ator, tbl_ator.nome_ator, tbl_ator.nome_completo_ator, tbl_ator.data_nascimento, tbl_ator.imagem_ator, 
        GROUP_CONCAT(tbl_atividade.atividade separator ', ') AS atividade, tbl_pais.pais FROM tbl_ator JOIN tbl_atividade_ator ON tbl_ator.cod_ator = tbl_atividade_ator.cod_ator
        JOIN tbl_atividade ON tbl_atividade_ator.cod_atividade = tbl_atividade.cod_atividade JOIN tbl_pais ON tbl_ator.cod_pais = tbl_pais.cod_pais
        WHERE ator_mes = 1 AND tbl_ator.ativo = 1 GROUP BY tbl_ator.cod_ator ORDER BY tbl_ator.cod_ator";
        $select = mysqli_query($conexao, $sql);
        
    }

    if($rsator = mysqli_fetch_array($select)){
            
        $cod_ator = $rsator['cod_ator'];
        $nome = $rsator['nome_ator'];
        $nome_completo = $rsator['nome_completo_ator'];
        $dt_nasc = $rsator['data_nascimento'];
        $imagem = $rsator['imagem_ator'];
        $pais = $rsator['pais'];
        $atividade = $rsator['atividade'];
        
    }

?>

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
                    type: "POST", //"POST"
                    url: "modal_filmografia.php",
                    data: {cod: idItem},
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
                        <?php 
                        
                            $sql = "SELECT * FROM tbl_ator WHERE ator_mes = 1 LIMIT 6";
                        
                            $select = mysqli_query($conexao, $sql);
            
                            while($rsatoresMes = mysqli_fetch_array($select)){
                        ?>
                        
                        <div class="swiper-slide">
                          <figure class="slide-bgimg" style=" background-image: url(img_atores/<?php echo($rsatoresMes['imagem_ator'])?>);">
                            <img src="img_atores/<?php echo($rsatoresMes['imagem_ator'])?>" alt="<?php echo($rsatoresMes['nome_ator'])?>" title="<?php echo($rsatoresMes['nome_ator'])?>" class="entity-img" />
                          </figure>
                          <div class="content">
                            <p class="title"><?php echo($rsatoresMes['nome_ator'])?></p>
                            <span class="caption"></span>
                          </div>
                        </div>
                       
                         <?php 
                        } 

                        $sql = "SELECT * FROM tbl_ator WHERE ator_mes = 1 LIMIT 6";
                        
                        $select = mysqli_query($conexao, $sql);

                        if($rsatoresMes = mysqli_fetch_array($select) == null) { 
                            $mensagem = "<div id='mensagem'> <p>Conteudo Indisponivel</p> </div>";
                        } else {
                            $mensagem = "";
                        }
                       
                        
                       ?>

                    </div>
                
                </div>
                  <!-- If we need navigation buttons -->
                  <div class="swiper-button-prev swiper-button-white"></div>
                  <div class="swiper-button-next swiper-button-white"></div>
                
                   <div class="swiper-container nav-slider loading">
                  <div class="swiper-wrapper">
                      
                      
                      <?php 
                        
                            $sql = "SELECT * FROM tbl_ator WHERE ator_mes = 1 LIMIT 6";
                        
                            $select = mysqli_query($conexao, $sql);
            
                            while($rsatoresMes = mysqli_fetch_array($select)){
                        ?>
                      
                      
                      
                    <div class="swiper-slide">
                        <a href="atores.php?id=<?php echo($rsatoresMes['cod_ator']) ?>">
                            <figure class="slide-bgimg" style="background-image: url(img_atores/<?php echo($rsatoresMes['imagem_ator'])?>);">
                                <img src="img_atores/<?php echo($rsatoresMes['imagem_ator'])?>" class="entity-img" alt="" title="" />
                            </figure>
                            <div class="content">
                                <p class="title"><?php echo($rsatoresMes['nome_ator']) ?></p>
                            </div>
                        </a>
                    </div>
                      
                      <?php } ?>
                      
                       </div>
            </div>

                    <!-- Thumbnail navigation -->

                    <?php echo($mensagem); ?>
             
                 <div id="redes-socias">
                    <div class="icones center" style="background-image: url(img/facebook.png);"></div>
                    <div class="icones center" style="background-image: url(img/instagram.png);"></div>
                    <div class="icones center" style="background-image: url(img/twitter.png);"></div>
                </div>
            </div>
            <div id="conteudo"> 
                
                <!-- CONTEUDO ATOR EM DESTAQUE-->
                <div id="caixa-ator-destaque" class="center">
                    
                    <div id="ator-destaque">
                        <div id="titulo-destaque"> <h1> <?php echo($nome)?> </h1> </div>
                        <div id="informacoes-ator">
                            <p class="info-atores"> Nome </p>
                            <p class="informacoes"><?php echo($nome_completo)?></p>
                            <p class="info-atores"> Data de Nascimento </p>
                            <p class="informacoes"><?php echo($dt_nasc)?></p>
                            <p class="info-atores"> Nacionalidade </p>
                            <p class="informacoes"> <?php echo($pais)?></p>
                            <p class="info-atores"> Atividades </p>
                            <p class="informacoes"><?php echo($atividade)?></p>
                        </div>
                        
                        <figure id="img-ator-destaque">
                            <img src="img_atores/<?php echo($imagem)?>" alt="" title="">
                        </figure>
                        
                        <div id="detalhes-ator-destaque">
                            
                            <div class="itens-detalhes filmografia" onclick="visualizarFilmografia(<?php echo($cod_ator)?>)"> Filmografia
                                <p> Clique para ver </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <!-- CONTEUDO PARA FALAR DE OUTROS ATORES -->
                <div id="caixa-atores">
                    <h2 id="titulo-atores"> Outros atores e atrizes</h2>
                    <div id="atores">
                        
                        <div class="imagens-atores">

                        <?php 

                            $sql="SELECT tbl_ator.nome_ator, tbl_ator.nome_completo_ator, tbl_ator.data_nascimento, tbl_ator.imagem_ator, 
                            GROUP_CONCAT(tbl_atividade.atividade separator ',') AS atividade, tbl_pais.pais FROM tbl_ator JOIN tbl_atividade_ator ON tbl_ator.cod_ator = tbl_atividade_ator.cod_ator
                            JOIN tbl_atividade ON tbl_atividade_ator.cod_atividade = tbl_atividade.cod_atividade JOIN tbl_pais ON tbl_ator.cod_pais = tbl_pais.cod_pais
                            WHERE ator_mes <> 1 AND tbl_ator.ativo = 1 GROUP BY tbl_ator.cod_ator;";
                        
                            $select = mysqli_query($conexao, $sql);

                            while($rsatores = mysqli_fetch_array($select)){

                        ?>

                              <div class="atores">
                                <figure class="img-atores">
                                  <img src="img_atores/<?php echo($rsatores['imagem_ator']) ?>" alt="<?php echo($rsatores['nome_ator']) ?>" title="<?php echo($rsatores['nome_ator']) ?>">
                                </figure>
                                <div class="texto-atores">
                                  <h2 class="nome-ator"> <?php echo($rsatores['nome_ator']) ?></h2>
                                    <p class="info-atores"> Nome </p>
                                    <p class="informacoes"><?php echo($rsatores['nome_completo_ator']) ?></p>
                                    <p class="info-atores"> Data de Nascimento </p>
                                    <p class="informacoes"><?php echo($rsatores['data_nascimento']) ?></p>
                                    <p class="info-atores"> Nacionalidade </p>
                                    <p class="informacoes"> <?php echo($rsatores['pais']) ?></p>
                                    <p class="info-atores"> Atividades </p>
                                    <p class="informacoes"><?php echo($rsatores['atividade']) ?></p>
                                </div>
                              </div>
                            
                        <?php } ?>

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