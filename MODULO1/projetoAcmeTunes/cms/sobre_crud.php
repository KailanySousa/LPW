<?php 

    session_start();

    require_once("../bd/conexao.php");
    $conexao = conexaoMysql();

    $titulo = "";
    $texto = "";
    $btn_modo = "Salvar";

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        $cod_sobre = $_GET['id'];
        
        if($modo == "excluir"){
            
            $imagem = $_GET['imagem'];
            
            $sql = "DELETE FROM tbl_sobre WHERE cod_sobre=".$cod_sobre;
            
            mysqli_query($conexao, $sql);

            // Apagando a imagem fisicamente do servidor
            $imagem = "../img/".$imagem;
            unlink($imagem);
            
            header('location:sobre_crud.php');
        } else if ($modo == "buscar"){
            $sql="SELECT * FROM tbl_sobre WHERE cod_sobre=".$cod_sobre;
        
            $select = mysqli_query($conexao, $sql);

            $_SESSION['cod_sobre'] = $cod_sobre;

            $btn_modo = "Editar";

            if($rssobre = mysqli_fetch_array($select)){
                $titulo = $rssobre['titulo'];
                $texto = $rssobre['texto'];
                $imagem = $rssobre['imagem'];

                $_SESSION['nome_foto'] = $imagem;
            }
        }
    }

    if(isset($_GET['ativo'])){
        
        $sobre_ativo = $_GET['ativo'];
        $cod_sobre = $_GET['id'];
        
        if( $sobre_ativo == 0){
            
            $sql = "SELECT COUNT(ativo) AS quantidade_ativos FROM tbl_sobre WHERE ativo=1;";
            $select = mysqli_query($conexao, $sql);
            if($rsativos=mysqli_fetch_array($select)){
                $quantidade_ativos = $rsativos['quantidade_ativos'];
                
                if($quantidade_ativos == 4){
                    
                    $sql = "UPDATE tbl_sobre SET ativo=0 WHERE ativo=0";
                    mysqli_query($conexao, $sql);
                    
                    echo("<script> alert('Só é permitido ativar 4 registros') </script>");
                } else {
                    $sobre_ativo = 1;
                }
            }
            
            
        } else if ($sobre_ativo == 1){
            $sobre_ativo = 0;
        }
        
        $sql = "UPDATE tbl_sobre SET ativo=".$sobre_ativo." WHERE cod_sobre=".$cod_sobre;
        
        mysqli_query($conexao, $sql);
    }
    
    if(isset($_POST['btn-cadastrar'])){
        
        $titulo = $_POST['txt-titulo'];
        $texto = $_POST['txt-texto'];

        if(!empty($_FILES['fle-imagem']['name'])){

            // Arquivos permitidos no upload
            $arquivos_permitidos = array(".jpg", ".jpeg", ".png");
        
            // Diretório onde as imagens serão gravadas no servidor
            $diretorio = "../img/";
                
            // Nome do arquivo a ser upado para o servidor
            $arquivo = $_FILES['fle-imagem']['name'];
        
            // Tamanho do arquivo
            $tamanho_arquivo = $_FILES['fle-imagem']['size'];
        
            // Transforma o tamanho do arquivo em kbytes
            $tamanho_arquivo = round($tamanho_arquivo/1024);
            
            // Extensão do arquivo
            $extensao_arquivo = strrchr($arquivo, ".");
        
            // Nome do arquivo, sem a extensão
            $nome_arquivo = pathinfo($arquivo, PATHINFO_FILENAME);
        
            $arquivo_criptografado = md5(uniqid(time().$nome_arquivo));
                    
            // Juntando o nome do arquivo já criptografado com a extensão                            
            $imagem = $arquivo_criptografado . $extensao_arquivo;
            
            // Validação das extensões de arquivos permitidos
            if(in_array($extensao_arquivo, $arquivos_permitidos)){
                
                //Validação de tamanho de arquivo
                if($tamanho_arquivo <= 5000){
                    
                    // Caminho do diretório temporário que a imagem foi guardade no servidor
                    $arquivo_temp = $_FILES['fle-imagem']['tmp_name'];
                    
                    if(move_uploaded_file($arquivo_temp, $diretorio . $imagem)){

                        if($_POST['btn-cadastrar'] == 'Salvar'){
                            $sql="INSERT INTO tbl_sobre (titulo, texto, imagem) VALUES ('".$titulo."', '".$texto."', '".$imagem."');";
                        
                            mysqli_query($conexao, $sql);
                            
                            header("location:sobre_crud.php");
                                            
                        } else if ($_POST['btn-cadastrar'] == "Editar"){
                            
                            $sql = "UPDATE tbl_sobre SET titulo='".$titulo."', texto='".$texto."', imagem='".$imagem."' WHERE cod_sobre=".$_SESSION['cod_sobre'];
                        
                            if(mysqli_query($conexao, $sql)){
                                unlink('img/'.$_SESSION['nome_foto']);

                                header("location:sobre_crud.php");
                            } else {
                                echo("Erro no cadastro");
                            }
                        }
                        
                       
                    } else {
                        echo("Erro ao enviar o arquivo para o servidor");
                    }
                    
                } else {
                    echo("Tamanho de arquivo inválido");
                }
                
            } else {
                echo("Extensão inválida");
            }

        } else {

            if($_POST['btn-cadastrar'] == "Editar"){

                $sql = "UPDATE tbl_sobre SET titulo='".$titulo."', texto='".$texto."' WHERE cod_sobre=".$_SESSION['cod_sobre'];

                mysqli_query($conexao, $sql);
                header("location: sobre_crud.php");
            } else {
                echo("<script> alert('Por favor, escolha uma foto') </script>");
            }
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
        <link rel="stylesheet" type="text/css" href="css/sobre_crud.css">
        <meta charset="utf-8">
        
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
                <h2 id="titulo-crud"> Cadastro Sobre </h2>
                
                <div id="cadastro-sobre">
                    <form name="frm-sobre" action="sobre_crud.php" method="post" enctype="multipart/form-data">
                    
                        <div id="caixa-titulo">
                            <p> Titulo </p>
                            <input type="text" name="txt-titulo" value="<?php echo($titulo) ?>" required/>
                        </div>
                        
                        <div id="caixa-imagem">
                            <p> Imagem </p>
                            <input type="file" name="fle-imagem">
                        </div>

                        <div id="caixa-texto" >
                            <p> Texto </p>
                            <textarea name="txt-texto" required><?php echo($texto) ?></textarea>
                        </div>

                        
                        <?php 
                
                            if(isset($imagem)){
                        
                        ?>

                        <div id="caixa-foto">
                            <img src="../img/<?php echo($imagem)?>" alt="">
                        </div>

                        <?php } else { ?>

                        <div id="caixa-foto">
                        </div>
                        <?php } ?>
                        
                        <input id="btn-cadastrar" type="submit" name="btn-cadastrar" value="<?php echo($btn_modo) ?>"/>
                        
                    </form>
                </div>
                
                <table id="registros">
                    <tr>
                        <td class="titulo-coluna"> Titulo </td>
                        <td class="titulo-coluna" style="width: 350px;"> Texto </td>
                        <td class="titulo-coluna" style="width: 150px;"> Imagem </td>
                    </tr>

                <?php

                    $sql = "SELECT * FROM tbl_sobre";

                    $select = mysqli_query($conexao, $sql);
                
                    while($rsregistros=mysqli_fetch_array($select)){
                ?>
                    <tr> 
                        <td class="dados-coluna"><?php echo($rsregistros['titulo']) ?></td>
                        <td class="dados-coluna" style="width: 350px;"><?php echo($rsregistros['texto']) ?></td>
                        <td class="dados-coluna" style="width: 150px;"><img src="../img/<?php echo($rsregistros['imagem']) ?>"> </td>
                        
                        <td class="dados-coluna" style="width: 110px;">
                            <figure id="icones">
                                <a href="sobre_crud.php?modo=buscar&id=<?php echo($rsregistros['cod_sobre'])?>"><img class="view-registro" src="icon/edit.png"></a>
                                
                                <a href="sobre_crud.php?ativo=<?php echo($rsregistros['ativo'])?>&id=<?php echo($rsregistros['cod_sobre'])?>">
                                    
                                    <?php 
                                        if($rsregistros['ativo'] == 0){
                                            $icone_ativo = "icon/cancel.png";
                                        } else {
                                            $icone_ativo = "icon/accept.png";
                                        }
                                    ?>
                                    
                                    <img src="<?php echo($icone_ativo) ?>"> 
                                </a>
                                
                                <a href="sobre_crud.php?modo=excluir&id=<?php echo($rsregistros['cod_sobre'])?>&imagem=<?php echo($rsregistros['imagem'])?>">
                                    <img src="icon/trash.png" onclick="return confirm('Deseja realmente excluir esse registro?')"> 
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