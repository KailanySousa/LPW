<!doctype html>
<html lang="pt-br">
    <head>
        <title>
            Sobre
        </title>

        <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" type="text/css" href="css/sobre.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        
        <meta charset="utf-8">
    </head>
    <body>
        <header>
            <?php require_once("menu.php")?>
        </header>
        
        <div id="caixa-conteudo" class="center">
            
            <div id="titulo" class="center"> <h1>Acme Tunes</h1></div>
            <div id="conteudo"> 
                    
                <?php 
    
                    require_once ("bd/conexao.php");
                    $conexao = conexaoMysql();
    
                    $sql = "SELECT * FROM tbl_sobre WHERE ativo=1 LIMIT 4 ";
                    $select = mysqli_query($conexao, $sql);
            
                    while($rssobre=mysqli_fetch_array($select)){
                                
                ?>
                
                <div class="img-sobre"> <!-- História da locadora -->
                    
                        <div class="titulo-sobre">
                            <?php echo($rssobre['titulo']) ?>
                        </div>
                        <div class="icones-sobre" style="background-image:url(img/<?php echo($rssobre['imagem']) ?>)"></div>
                        <div class="textos"> 
                            <p> <?php echo($rssobre['texto']) ?></p>
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