<?php 

    //verifica se alguma variavel de sessão já foi iniciada
    if (!isset($_SESSION)) {
        session_start();
    }

    // arquivo com a conexão do banco
    require_once("../bd/conexao.php");
    $conexao = conexaoMysql();


    // variaveis padrão
    $atividade = "";
    $btn_modo = "Salvar";	

    // verifica se a variavel modo existe para que possa ser feito a exclusão ou atualização do registro
    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        $cod_atividade = $_GET['id'];
        
        //armazena o codigo do registro numa varivel de sessão
        $_SESSION['cod_atividade'] = $cod_atividade;
        
        // se modo for igual a excluir, será feito uma exclusão no banco
        if($modo == "excluir"){
            
            $sql = "DELETE FROM tbl_atividade WHERE cod_atividade=".$cod_atividade;

            mysqli_query($conexao, $sql);
            
            header('location:cadastro_atividade.php');

        // se modo for igual a buscar, será feito uma busca no banco
       } else if ($modo == "buscar"){
           
           $btn_modo = "Editar";
           
           $sql = "select * from tbl_atividade WHERE cod_atividade=".$cod_atividade;
           
           $select = mysqli_query($conexao, $sql);
           
           if($rsatividade=mysqli_fetch_array($select)){
                $atividade = $rsatividade['atividade'];
           }
        }
    }

    //CADASTRO DE ATIVIDADES
    if(isset($_POST['btn-cadastrar-atividade'])){
        
        $atividade = $_POST['txt-atividade'];

        // se botão for igual a salvar, será salvo um novo regitro
        if($_POST['btn-cadastrar-atividade'] == "Salvar"){

            $sql = "INSERT INTO tbl_atividade (atividade) VALUES ('".$atividade."')";
        
            mysqli_query($conexao, $sql);

        // se botão for igual a editar, será atualizado um regitro
        } else if ($_POST['btn-cadastrar-atividade'] == "Editar"){

            $sql = "UPDATE tbl_atividade SET atividade='".$atividade."' WHERE cod_atividade=".$_SESSION['cod_atividade'];
        
            mysqli_query($conexao, $sql);
        }
        
        header('location:cadastro_atividade.php');

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
        <script src="../js/jquery.js"></script>
        <meta charset="utf-8">
        
    </head>
    <body>
        <div id="caixa-cms" class="center">
            <header>
                <?php require_once("menu.php") ?>
            </header>
            
    
            <div id="caixa-conteudo"> 
                <h2 id="titulo-crud"> Atores </h2>

                <div id="caixa-menu-lateral">
                    <a href="atores_crud.php"><div class="itens-menu"> Atores </div></a>
                </div>

                <div id="cadastro-atividades">
                    <form name="frm-atividade" method="post" action="cadastro_atividade.php">
                        <div class="caixa-atividade-pais"> 
                            <p> Atividade </p>
                            <input type="text" name="txt-atividade" value="<?php echo($atividade) ?>" required onkeypress="return validarLetra(event);"/>
                            </div>
                        
                        <input class="btn-cadastrar" type="submit" name="btn-cadastrar-atividade" value="<?php echo($btn_modo) ?>">

                    </form>
                </div>
            </div>

            <table id="registros" style="width: 400px; margin-left: 250px;">
                    <tr>
                        <td class="titulo-coluna"> Atividade </td>
                    </tr>

                <?php

                    // select na tabela de atividade para mostrar na tabela
                    $sql = "SELECT * FROM tbl_atividade";

                    $select = mysqli_query($conexao, $sql);    
                
                    while($rsregistros=mysqli_fetch_array($select)){
                ?>
                    <tr> 
                        <td class="dados-coluna"><?php echo($rsregistros['atividade']) ?></td>
                        <td class="dados-coluna">
                            <figure id="icones">
                                <a href="cadastro_atividade.php?modo=buscar&id=<?php echo($rsregistros['cod_atividade']) ?>"> <img src="icon/edit.png" alt="Editar" title="Editar"> </a>
                                <a href="cadastro_atividade.php?modo=excluir&id=<?php echo($rsregistros['cod_atividade'])?>" onclick="return confirm('Deseja realmente excluir esse registro?')"><img src="icon/trash.png" alt="Excluir" title="Excluir"></a>
                            </figure>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </table>
            
            <footer>
                <p> Desenvolvido por: Kailany Sousa da Gama</p>
            </footer>
        </div>
        <script src="../js/validar.js"> </script>
    </body>
</html>