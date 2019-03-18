<script>
    $(document).ready(function(){

       $(".fechar-modal").click(function(){
          $("#container-biografia").toggle(400);
       });

    });
    
</script>

<style>
    @font-face{
    font-family: fonte;
    src: url(../fontes/COPRGTB.TTF);
    }
    
    #titulo{
        width: inherit;
        height: 60px;
        font-size: 30px;
        font-family: fonte;
        text-align:center;
        box-sizing: border-box;
        padding-top: 10px;
    }
    
    #conteudo-biografia{
        width: inherit;
        min-height:650px;
        max-height: auto;
        overflow: hidden;
    }
    
    .biog{
        line-height: 1.5;
        letter-spacing: 2px;
        font-size: 16px;
        margin-bottom: 10px;
        box-sizing: border-box;
        padding-left: 10px;
        padding-right: 10px;
        font-family: fonte;
    }
    
    .biografia::first-letter{
        box-sizing: border-box;
        padding-left: 20px;
        font-size: 20px;
    }
    
</style>

 <div class="fechar-modal"> </div>
<div>
    <div id="titulo">
        <h1> Sandra Bullock</h1>
    </div>
    
    <div id="conteudo-biografia"> 
        <p class="biog">
            Filha de uma cantora alemã de ópera, Helga Bullock, e de um professor de canto americano, John W. Bullock, Sandra cresceu atrelada indiretamente ao palco, muitas vezes fazendo parte do elenco infantil dos espetáculos em que a mãe atuava. Cresceu nos arredores de Washington, DC, aprendendo balé e sendo líder de torcida na escola. Mais tarde, estudou Arte Dramática na Universidade Carolina do Leste, mas seguiu para Nova Iorque antes de se graduar. Lá dividiu o tempo entre o trabalho de garçonete e aulas de teatro com o professor Sanford Meisner.
        </p>
        
        <p class="biog">
            Sua primeira atuação profissional, em 1988, na produção da Broadway “No Time Flat”, foi bem aceita pela crítica. No ano seguinte, ganhou seu primeiro papel na televisão na série “O Homem de Seis Milhões de Dólares e A Mulher Biônica” e “Secretária do Futuro”, trabalho que rendeu apenas 12 episódios. Mudou-se para Los Angeles, onde permaneceu com papéis secundários na televisão até 1992, quando atuou como atriz principal da comédia romântica “Poção do Amor Nº 9”. Mas, foi apenas atuando em “O Demolidor”, no ano seguinte, que Sandra conseguiria mostrar ser capaz. Em 1994, chegou fama e sucesso: contracenou com Keanu Reeves e Dennis Hopper em “Velocidade Máxima” – sucesso absoluto de bilheteria.
        </p>
        
        <p class="biog">
            Sandra se tornava uma das atrizes mais bem pagas de Hollywood. “Enquanto Você Dormia”, de 1995, só confirmaria seu sucesso. Mesmo diante de alguns fiascos em filmes como “Corações Roubados” e inclusive “Velocidade Máxima 2”, a atriz conseguiu se manter no time das estrelas criando uma produtora que deu rédeas ao “Quando o Amor Acontece” e, posteriormente, ao filme “Da Magia à Sedução”.
        </p>
        
        <p class="biog">
            Sua atuação em “28 dias” e “Miss Simpatia” seguiria a mesma linha dos trabalhos anteriores, até que em “Crash – No Limite”, a atriz mostraria mesmo em uma pequena participação que poderia interpretar papéis bem mais complexos. Em 2010, Sandra Bullock recebeu o Oscar de Melhor Atriz pela atuação no drama “Um Sonho Possível”.
        </p>
    </div>
</div>