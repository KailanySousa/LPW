<?php 

    $nota1 = "";
    $nota2 = "";
    $nota3 = "";
    $nota4 = "";
    $nota5 = "";

    if(isset($_POST['cod'])){

        require_once("bd/conexao.php");
        $conexao = conexaoMysql();

        $cod_ator = $_POST['cod'];
      
        $sql = "SELECT * FROM tbl_ator WHERE ator_mes=1 AND cod_ator=".$cod_ator;
        $select = mysqli_query($conexao, $sql);

        $rsator = mysqli_fetch_array($select);
        $nome = $rsator['nome_ator'];
        
        
    }

?>

<script>
    $(document).ready(function(){

       $(".fechar-modal").click(function(){
          $("#container-filmografia").toggle(400);
       });

    });
    
</script>


<link rel="stylesheet" href="css/rate.css">

<div class="fechar-modal"> </div>
<div>
    <div id="titulo">
        <h1> <?php echo($nome) ?></h1>
    </div>
    
    <!-- FILMES GRAVADOS PELO(A) ATOR/ATRIZ-->
    <div id="conteudo-filmografia"> 
        <div id="caixa-filmografia">
            <div class="linha">
                <div class="coluna-nome"> Filme </div>
                <div class="coluna-nome"> Ano </div>
                <div class="coluna-nome"> Avaliação</div>
            </div>
              
            <?php 
            
                $sql = "SELECT * FROM  tbl_filme JOIN tbl_filme_ator ON tbl_filme_ator.cod_filme = tbl_filme.cod_filme JOIN tbl_ator ON tbl_filme_ator.cod_ator = tbl_ator.cod_ator
                WHERE tbl_filme_ator.cod_ator=".$cod_ator;

                $select = mysqli_query($conexao, $sql);

                while($filmesator = mysqli_fetch_array($select)){

                    $avaliacao = $filmesator['avaliacao'];

                    if($avaliacao = 1){
                        $nota1 = "checked";
                    } else if($avaliacao = 2){
                        $nota2 = "checked";
                    } else if($avaliacao = 3){
                        $nota3 = "checked";
                    } else if($avaliacao = 4){
                        $nota4 = "checked";
                    }else if($avaliacao = 5){
                        $nota5 = "checked";
                    }
            ?>
            <div class="linha"> 
                <div class="coluna-dados"> <?php echo($filmesator['nome_filme']) ?></div>
                <div class="coluna-dados"> <?php echo($filmesator['ano_lancamento']) ?> </div>
                <div class="coluna-dados"> 
                    <div class="rate" style="margin-left: 65px;margin-top:-8px;">
                        <input type="radio" id="star5" name="rate" value="5" <?php echo($nota1) ?> />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" <?php echo($nota1) ?>/>
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" <?php echo($nota3) ?>/>
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" <?php echo($nota4) ?>/>
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" <?php echo($nota5) ?>/>
                        <label for="star1" title="text">1 star</label>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>