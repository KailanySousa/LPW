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
        <h1> Sandra Bullock</h1>
    </div>
    
    <div id="conteudo-filmografia"> 
        <div id="caixa-filmografia">
            <div class="linha">
                <div class="coluna-nome"> Filme </div>
                <div class="coluna-nome"> Ano </div>
                <div class="coluna-nome"> Avaliação</div>
            </div>
            
            <div class="linha"> 
                <div class="coluna-dados"> Bird Box </div>
                <div class="coluna-dados"> 2018 </div>
                <div class="coluna-dados"> 
                    <div class="rate" style="margin-left: 65px;margin-top:-8px;">
                        <input type="radio" id="star5" name="rate" value="5"  />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4"/>
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" checked/>
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>