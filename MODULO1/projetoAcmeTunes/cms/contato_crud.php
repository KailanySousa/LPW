<?php 

    require_once("../bd/conexao.php");
    $conexao = conexaoMysql();
    
    if(isset($_GET["modo"])){
        
        $modo = $_GET['modo'];
        $codigo = $_GET['id'];
        
        if($modo == "excluir"){
        
            $sql = "DELETE FROM tbl_faleconosco WHERE codigo=".$codigo;

            mysqli_query($conexao, $sql);
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS
        </title>
        
        <link rel="stylesheet" type="text/css" href="css/cms.css">
        <script src="../js/jquery.js"></script>
        <meta charset="utf-8">
        
         <script>
            $(document).ready(function(){
                
               $(".view-registro").click(function(){
                  $("#container").toggle(400);
               });
                
            });
            
            function visualizarRegistro(idItem){
                $.ajax({
                    type: "GET", //"POST"
                    url: "modal_registro.php",
                    data: {codigo: idItem},
                    success: function(dados){
                        $("#modal-registro").html(dados); //dados tem o conteúdo da pagina modal
                    }
                    
                });
            }
        </script>
    
    </head>
    <body>
        <div id="container"> 
            <div id="modal-registro" class="center">

            </div>
        </div>
        <div id="caixa-cms" class="center">
            <header>
                <?php require_once("menu.php") ?>
            </header>
            
            
            <div id="caixa-conteudo"> 
                <h2 id="titulo-crud"> Contato </h2>
                
                <table id="registros">
                    <tr>
                        <td class="titulo-coluna"> Nome </td>
                        <td class="titulo-coluna"> Celular </td>
                        <td class="titulo-coluna"> Email </td>
                    </tr>

                <?php 
                    require_once("../bd/conexao.php");

                    $conexao = conexaoMysql();

                    $sql = "SELECT * FROM tbl_faleconosco";

                    $select = mysqli_query($conexao, $sql);
                
                    while($rsregistros=mysqli_fetch_array($select)){
                ?>
                    <tr> 
                        <td class="dados-coluna"><?php echo($rsregistros['nome']) ?></td>
                        <td class="dados-coluna"><?php echo($rsregistros['celular']) ?></td>
                        <td class="dados-coluna"><?php echo($rsregistros['email']) ?></td>
                        <td class="dados-coluna" style="width: 80px;">
                            <figure id="icones">
                                <img class="view-registro" onclick="visualizarRegistro(<?php echo($rsregistros['codigo'])?>)" src="icon/folder_explore.png">
                                
                                <a href="contato_crud.php?modo=excluir&id=<?php echo($rsregistros['codigo']) ?>" onclick="return confirm('Deseja realmente excluir esse registro?');">
                                    <img src="icon/cross.png"></a>
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