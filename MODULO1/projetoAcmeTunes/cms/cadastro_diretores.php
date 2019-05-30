<?php 

    require_once("../bd/conexao.php");
    $conexao = conexaoMysql();

    $nome_diretor = "";

    $btn_modo = "Salvar";

    if (!isset($_SESSION)) {
        session_start();
    }


    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        $cod_diretor = $_GET['id'];
        
        $_SESSION['cod_diretor'] = $cod_diretor;
        
        if($modo == "excluir"){

            $sql = "DELETE FROM tbl_filme_diretor WHERE cod_filme=".$cod_diretor;

            mysqli_query($conexao, $sql);
            
            $sql = "DELETE FROM tbl_diretor WHERE cod_diretor=".$cod_diretor;
           
            mysqli_query($conexao, $sql);

            header("location:cadastro_diretores.php");

       } else if ($modo == "buscar"){
           
           $btn_modo = "Editar";
           
           $sql = "SELECT * FROM tbl_diretor WHERE cod_diretor=".$cod_diretor;
           
           $select = mysqli_query($conexao, $sql);
           
           if($rsfilme=mysqli_fetch_array($select)){
                $nome_diretor = $rsfilme['nome_diretor'];
           }
        }
    }

     //CADASTRO DE DIRETORES
     if(isset($_POST['btn-cadastrar-diretor'])){
        
        $nome_diretor = $_POST['txt-nome'];

        if($_POST['btn-cadastrar-diretor'] == "Salvar"){
            $sql = "INSERT INTO tbl_diretor (nome_diretor) VALUES ('".$nome_diretor."')";
        
            mysqli_query($conexao, $sql);
            header("location:cadastro_diretores.php");

        } else if ($_POST['btn-cadastrar-diretor'] == "Editar"){

            $sql = "UPDATE tbl_diretor SET nome_diretor='".$nome_diretor."' WHERE cod_diretor=".$_SESSION['cod_diretor'];
        
            mysqli_query($conexao, $sql);
            header("location:cadastro_diretores.php");
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
        <link rel="stylesheet" type="text/css" href="css/produtos_crud.css">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/jquery.form.js"></script>
        <link rel="stylesheet" href="../css/rate.css">

        <style> #registros{ width: 100px; } </style>
        
        <meta charset="utf-8">
        
    </head>
    <body>
        <div id="caixa-cms" class="center">
            <header>
                <?php require_once("menu.php") ?>
            </header>
            
    
            <div id="caixa-conteudo"> 
                <h2 id="titulo-crud"> Produtos </h2>

                <div id="caixa-menu-lateral">
                    <a href="produtos_crud.php"><div class="itens-menu"> Filmes </div></a>
                </div>
                
                <div id="cadastro-diretores">

                    <form name="frm-diretores" method="post" action="cadastro_diretores.php">
                        <div id="caixa-titulo"> 
                            <p> Nome</p>
                            <input type="text" name="txt-nome" value="<?php echo($nome_diretor)?>" required onkeypress="return validarLetra(event);"/>
                        </div>
                        
                        <input class="btn-cadastrar" type="submit" name="btn-cadastrar-diretor" value="<?php echo($btn_modo) ?>"/>
                    </form>
                </div>
                
                <table id="registros">
                    <tr>
                        <td class="titulo-coluna"> Diretor </td>
                        <td style="text-align: center"> </td>
                        
                    </tr>

                <?php

                    $sql = "SELECT * FROM tbl_diretor";

                    $select = mysqli_query($conexao, $sql);    
                
                    while($rsregistros=mysqli_fetch_array($select)){
                ?>
                    <tr> 
                        <td class="dados-coluna"><?php echo($rsregistros['nome_diretor']) ?></td>
                        
                        <td class="dados-coluna">
                            <figure id="icones">
                                <a href="cadastro_diretores.php?modo=buscar&id=<?php echo($rsregistros['cod_diretor']) ?>"> <img src="icon/edit.png" alt="Editar" title="Editar"> </a>
                                <a href="cadastro_diretores.php?modo=excluir&id=<?php echo($rsregistros['cod_diretor'])?>" onclick="return confirm('Deseja realmente excluir esse registro?')"><img src="icon/trash.png" alt="Excluir" title="Excluir"></a>
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
        <script src="../js/validar.js"></script>
    </body>
</html>