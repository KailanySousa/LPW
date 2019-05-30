<?php 
    require_once("bd/conexao.php");
    $conexao = conexaoMysql();
?>
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
            <!-- MENU PARA FILTRAR AS CIDADES QUE POSSUEM LOJAS -->
                <div id="itens-lateral">
                    
                    <?php 
                        
                        $sql = "SELECT tbl_cidade.cidade FROM tbl_loja JOIN tbl_cidade ON tbl_loja.cod_cidade = tbl_cidade.cod_cidade WHERE tbl_loja.ativo = 1 GROUP BY tbl_cidade.cidade;";
                        $select = mysqli_query($conexao, $sql);
            
                        while($rsestados=mysqli_fetch_array($select)){
                    ?>
                    <div class="itens center"> <?php echo($rsestados['cidade']) ?> </div>
                    <?php } ?>
                </div>
            <div id="conteudo"> 
                <div id="titulo" class="center"> <h1>Nossas Lojas</h1></div>
                
                <?php 
                    
                    $sql = "SELECT tbl_loja.endereco_mapa, tbl_cidade.cidade, tbl_loja.endereco, tbl_loja.cep FROM tbl_loja JOIN tbl_cidade ON tbl_loja.cod_cidade = tbl_cidade.cod_cidade WHERE tbl_loja.ativo=1";
                    $select = mysqli_query($conexao,  $sql);
            
                    while($rslojas=mysqli_fetch_array($select)){
                ?>
                <!-- ENDEREÇOS DAS LOJAS-->
                <div class="caixa-loja center">
                    <div class="img-loja"><iframe src="<?php echo($rslojas['endereco_mapa']) ?>" width="300" height="200" style="border:0" allowfullscreen></iframe></div>
                    <div class="endereco-loja">
                        <h2> <?php echo($rslojas['cidade']) ?> </h2>
                        <p> <?php echo($rslojas['endereco']) ?></p>
                        <p> <?php echo($rslojas['cep']) ?></p>
                    </div>
                </div>
                
                <?php } ?>
            </div>
        </div>
        <footer>
           <?php require_once("footer.php") ?>
        </footer>

    </body>
</html>