<!doctype html>
<html lang="pt-br">
    <head>
        <title>
            Lojas
        </title>

        <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" type="text/css" href="css/itens_lateral.css">
        <link rel="stylesheet" type="text/css" href="css/lojas.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        
        <meta charset="utf-8">
    </head>
    <body>
        <header>
            <?php require_once("menu.php")?>
        </header>
        
        <div id="caixa-conteudo" class="center">
                <div id="itens-lateral">
                    <div class="itens center"> Barueri </div>
                    <div class="itens center"> Itapevi </div>
                    <div class="itens center"> Jandira </div>
                    <div class="itens center"> Osasco </div>
                    <div class="itens center"> São Paulo </div>
                </div>
            <div id="conteudo"> 
                <div id="titulo" class="center"> <h1>Nossas Lojas</h1></div>
                
                <div class="caixa-loja center">
                    <div class="img-loja"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.9685992801587!2d-46.6952585848703!3d-23.605459069107592!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5734ed964f87%3A0xcd3b4eacb68f1ad4!2sAv.+Engenheiro+Lu%C3%ADs+Carlos+Berrini%2C+S%C3%A3o+Paulo+-+SP!5e0!3m2!1spt-BR!2sbr!4v1552655641666" width="300" height="200" style="border:0" allowfullscreen></iframe></div>
                    <div class="endereco-loja">
                        <h2> Jandira </h2>
                        <p> Rua Luis Carlos Berrini, n°666</p>
                        <p>CEP: 06600-040</p>
                        <p> Centro, Jandira - SP</p>
                    </div>
                </div>
                
                <div class="caixa-loja center">
                    <div class="img-loja"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1828.8155410697993!2d-46.93468384188906!3d-23.545767737279615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf06855c595f01%3A0xfd2777f0b36c227b!2sAv.+Ces%C3%A1rio+de+Abreu+-+Centro%2C+Itapevi+-+SP%2C+06653-020!5e0!3m2!1spt-BR!2sbr!4v1552655921070" width="300" height="200" style="border:0" allowfullscreen></iframe></div>
                    <div class="endereco-loja">
                        <h2> Itapevi </h2>
                        <p> Av. Cesário de Abreu, n°124</p>
                        <p>CEP: 06653-020</p>
                        <p> Centro, Itapevi - SP</p>
                    </div>
                </div>
                
                <div class="caixa-loja center">
                    <div class="img-loja"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.3681534878096!2d-46.92586058487131!3d-23.555217667250986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf06ea5ce8f6e9%3A0x48cfcb57976d47cf!2sAv.+Bruna%2C+Itapevi+-+SP!5e0!3m2!1spt-BR!2sbr!4v1552656258927" width="300" height="200" style="border:0" allowfullscreen></iframe></div>
                    <div class="endereco-loja">
                        <h2> Itapevi </h2>
                        <p> Av. Bruna, n°264</p>
                        <p>CEP: 06657-840</p>
                        <p> Parque Wey, Itapevi - SP</p>
                    </div>
                </div>
            </div>
        </div>
        <footer>
           <?php require_once("footer.php") ?>
        </footer>

    </body>
</html>