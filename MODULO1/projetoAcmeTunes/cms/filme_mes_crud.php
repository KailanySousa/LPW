<?php 

    require_once("../bd/conexao.php");
    $conexao = conexaoMysql();

    $ator_mes = 0;	


    
    if(isset($_GET['filme_mes'])){
        
        $filme_mes = $_GET['filme_mes'];
        $cod_filme = $_GET['id'];
        
        if($filme_mes == 0){

            $sql ="SELECT COUNT(filme_mes) AS quantidade_filme_mes FROM tbl_filme WHERE filme_mes=1";
            $select = mysqli_query($conexao, $sql);

            $rsfilme_mes = mysqli_fetch_array($select);
            $quantidade_filme_mes = $rsfilme_mes['quantidade_filme_mes'];

            if($quantidade_filme_mes >= 1){

                $sql="UPDATE tbl_filme SET filme_mes=0";
                mysqli_query($conexao, $sql);

                $filme_mes = 1;
            } else {
                $filme_mes = 1;
            }
        
                
        } else if ($filme_mes == 1){

            $sql="UPDATE tbl_filme SET filme_mes=0";
            mysqli_query($conexao, $sql);

            $filme_mes = 1;
            

        }
        
        $sql = "UPDATE tbl_filme SET filme_mes=".$filme_mes." WHERE cod_filme=".$cod_filme;
        
        mysqli_query($conexao, $sql);
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS
        </title>
        
        <link rel="stylesheet" type="text/css" href="css/cms.css">
        <link rel="stylesheet" type="text/css" href="css/atores_crud.css">
        
        <meta charset="utf-8">
        
    </head>
    <body>
        <div id="caixa-cms" class="center">
            <header>
                <?php require_once("menu.php") ?>
            </header>
            
    
            <div id="caixa-conteudo"> 
                <h2 id="titulo-crud"> Filme do Mês </h2>
                
                <table id="registros">
                    <tr>
                        <td class="titulo-coluna"> Filme </td>
                        <td class="titulo-coluna"> Imagem </td>
                        <td class="titulo-coluna"> Ano Lançamento </td>
                    </tr>

                <?php

                    $sql = "SELECT * FROM tbl_filme";

                    $select = mysqli_query($conexao, $sql);    
                
                    while($rsregistros=mysqli_fetch_array($select)){
                ?>
                    <tr> 
                        <td class="dados-coluna"><?php echo($rsregistros['nome_filme']) ?></td>
                        <td class="dados-coluna" style="width: 150px;"><img src="../img_filmes/<?php echo($rsregistros['imagem_filme']) ?>"></td>
                        <td class="dados-coluna"><?php echo($rsregistros['ano_lancamento']) ?></td>
                        <td class="dados-coluna">
                            <figure id="icones">
                                <a href="filme_mes_crud.php?filme_mes=<?php echo($rsregistros['filme_mes']) ?>&id=<?php echo($rsregistros['cod_filme']) ?>"> 
                                    <img style="margin-left: 4px;" src="<?php 
                                                    if($rsregistros['filme_mes'] == 0){ 
                                                        $icon_filme_mes = "Filme do mês desativado";
                                                        echo('icon/no_destaque.png'); } 
                                                    else { 
                                                        $icon_filme_mes = "Filme do mês ativado";
                                                        echo('icon/destaque.png');}?>" alt="<?php echo($icon_filme_mes) ?>" title="<?php echo($icon_filme_mes) ?>" >
                                </a>
                            </figure>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </table>
            </div>
            
            <footer>
                <p> Desenvolvido por: Kailany Sousa da Gama</p>
            </footer>
        </div>
    </body>
</html>