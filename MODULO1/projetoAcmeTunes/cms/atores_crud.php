<?php 

    //VERIFICAR SE A VARIÁVEL DE SESSÃO JÁ FOI STARTADA
    if (!isset($_SESSION)) {
        //SE NÃO, STARTA
        session_start();
    }
    
    //ARQUIVO PHP QUE CONTEM AS FUNÇÕES DE CONVERSÃO DE DATA
    require_once("funcoes/converterData.php");

    //ARQUIVO PHP QUE CONTEM A FUNÇÃO QUE REALIZA A CONEXÃO COM O BANCO
    require_once("../bd/conexao.php");

    //VARIAVEL QUE RECEBE O RETORNO DA FUNÇÃO QUE FAZ A CONEXÃO COM O BANCO
    $conexao = conexaoMysql();

    //VARIAVEIS INICIADAS PARA QUE NÃO DÊ ERRO
    $nome = "";
    $nome_completo = "";
    $imagem_ator = "";
    $dt_nasc = "";
    $ator_mes = 0;
    $cod_pais = 0;
    $btn_modo = "Salvar";	
    $ator_mes_ativo = "selected";
    $ator_mes_desativo = "selected";
    $modo = "";

    
    if(isset($_GET['ator_mes'])){
        
        $ator_mes = $_GET['ator_mes'];
        $cod_ator = $_GET['id'];
        
        if($ator_mes == 0){

            $sql ="SELECT COUNT(ator_mes) AS quantidade_ator_mes FROM tbl_ator WHERE ator_mes=1";
            $select = mysqli_query($conexao, $sql);

            if($rsator_mes = mysqli_fetch_array($select)){
                $quantidade_ator_mes = $rsator_mes['quantidade_ator_mes'];

                if($quantidade_ator_mes >= 6){

                    $sql="UPDATE tbl_ator SET ator_mes=0 WHERE ativo=0";
                    mysqli_query($conexao, $sql);

                    echo("<script> alert('Só é permitido ativar 6 atores do mês') </script>");
                } else {
                    $ator_mes = 1;

                    $sql = "UPDATE tbl_ator SET ator_mes=".$ator_mes.", ativo=1 WHERE cod_ator=".$cod_ator;
        
                    mysqli_query($conexao, $sql);

                }
            }
                
        } else if ($ator_mes == 1){
            $ator_mes = 0;

            $sql = "UPDATE tbl_ator SET ator_mes=".$ator_mes." WHERE cod_ator=".$cod_ator;
        
            mysqli_query($conexao, $sql);

        }

        
    }


    if(isset($_GET['ativo'])){
        
        $ator_ativo = $_GET['ativo'];
        $cod_ator = $_GET['id'];
        
        if($ator_ativo == 0){
            $ator_ativo = 1;
                
        } else if ($ator_ativo == 1){
            $ator_ativo = 0;
        }
        
        $sql = "UPDATE tbl_ator SET ativo=".$ator_ativo." WHERE cod_ator=".$cod_ator;
        
        mysqli_query($conexao, $sql);
    }
    

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        $cod_ator = $_GET['id'];
        
        $_SESSION['cod_ator'] = $cod_ator;
        
        if($modo == "excluir"){
            
            $sql = "DELETE FROM tbl_ator WHERE cod_ator=".$cod_ator;

            mysqli_query($conexao, $sql);
            
            // Apaga o arquivo da imagem fisicamente do servidor
            $imagem = "../img/".$imagem;
            unlink($imagem);
            
            header('location:atores_crud.php');

       } else if ($modo == "buscar"){
           
           $btn_modo = "Editar";
           
           $sql = "select * from tbl_ator join tbl_pais ON tbl_ator.cod_pais = tbl_pais.cod_pais WHERE cod_ator=".$cod_ator;
           
           $select = mysqli_query($conexao, $sql);
           
           if($rsator=mysqli_fetch_array($select)){
                $nome = $rsator['nome_ator'];
                $nome_completo = $rsator['nome_completo_ator'];
                $imagem = $rsator['imagem_ator'];
                $dt_nasc = dataBrasileira($rsator['data_nascimento']);
                $ator_mes = $rsator['ator_mes'];
                $ativo = $rsator['ativo'];

                if($ator_mes == 1){
                    $ator_mes_ativo = "selected";
                } else {
                    $ator_mes_desativo = "selected";
                }

                $cod_pais = $rsator['cod_pais'];
                $pais = $rsator['pais'];

                $_SESSION['nome_foto'] = $imagem;
           }
        }
    }


    //CADASTRO DE ATIVIDADES DOS ATORES
    if(isset($_POST['btn-cadastrar-atividadeator'])){
        
        $cod_atividade = $_POST['slt-atividade'];
        $cod_ator = $_POST['slt-ator'];
        
        //INSERÇÃO NA TABELA RELACIONAMENTO DE ATOR E ATIVIDADE
        $sql = "INSERT INTO tbl_atividade_ator (cod_atividade, cod_ator) VALUES (".$cod_atividade.", ".$cod_ator.")";
        
        mysqli_query($conexao, $sql);
    }

    //CADASTRO DAS ATORES
    if(isset($_POST['btn-cadastrar-ator'])){
        
        $nome = $_POST['txt-nome'];
        $nome_completo = $_POST['txt-nome-completo'];
        $dt_nasc = dataAmericana($_POST['txt-dt-nasc']);
        $ator_mes = $_POST['sle-ator-mes'];
        $cod_pais = $_POST['sle-pais'];

        //VERIFICA SE O ELEMENTO FILE NÃO ESTÁ VAZIO
        if(!empty($_FILES['fle-imagem']['name'])){

            //ARRAY COM AS EXTENSÕES DE ARQUIVOS QUE SERÃO PERMITIDAS
            $arquivos_permitidos = array(".jpg", ".jpeg", ".png");
        
            //DIRETÓRIO PADRÃO, ONDE AS FOTOS SERÃO SALVAS NO SERVIDOR
            $diretorio = "../img_atores/";
            
            //PEGANDO DO ELEMENTO FILE O ATRIBUTO NAME
            $arquivo = $_FILES['fle-imagem']['name'];

            //PEGANDO DO ELEMENTO FILE O ATRIBUTO SIZE
            $tamanho_arquivo = $_FILES['fle-imagem']['size'];
            
            //CONVERTENDO O TAMANHO DA IMAGEM DE BYTES PARA KBYTES
            $tamanho_arquivo = round($tamanho_arquivo/1024);
            
            //PEGANDO APENAS A EXTENSÃO DO ARQUIVO
            $extensao_arquivo = strrchr($arquivo, ".");
            
            //PEGANDO APENAS O NOME DO ARQUIVO
            $nome_arquivo = pathinfo($arquivo, PATHINFO_FILENAME);
            
            //CRIPTOGRAFANDO O NOME DO ARQUIVO
            $arquivo_criptografado = md5(uniqid(time().$nome_arquivo));
            
            //JUNTANDO O NOME DO ARQUIVO CRIPTOGRAFADO COM A EXTENSÃO
            $imagem = $arquivo_criptografado . $extensao_arquivo;
            
            //VERIFICA SE A EXTENSÃO DO ARQUIVOS ENCONTRA-SE DENTRO DOS TIPOS ARQUIVOS PERMITIDOS
            if(in_array( $extensao_arquivo,$arquivos_permitidos)){
                
                //VERIFICA SE O TAMANHO DO ARQUIVO É MENOR QUE 5000KBYTES
                if($tamanho_arquivo <= 5000){
                    
                    //PASTA ONDEO ARQUIVO FICARÁ SALVO TEMPORARIAMENTE
                    $arquivo_temp = $_FILES['fle-imagem']['tmp_name'];
                    
                    //MOVENDO DA PASTA TEMPORARÁRIA PARA O DIRETÓRIO JÁ CRIADO
                    if(move_uploaded_file($arquivo_temp, $diretorio . $imagem)){

                        //VERIFICA SE O VALOR DO BOTÃO É IGUAL A SALVAR
                        if($_POST['btn-cadastrar-ator'] == 'Salvar'){
                             
                            //SE FOR, SERÁ FEITO UMA INSERÇÃO NO BANCO COM A IMAGEM
                            $sql = "INSERT INTO tbl_ator (nome_ator, nome_completo_ator, imagem_ator, data_nascimento, ator_mes, cod_pais) 
                            VALUES ('".$nome."', '".$nome_completo."', '".$imagem."', '".$dt_nasc."', ".$ator_mes.", ".$cod_pais.");";
                        
                            mysqli_query($conexao, $sql);

                        } else if ($_POST['btn-cadastrar-ator'] == "Editar"){ //VERIFICA SE O VALOR DO BOTÃO É IGUAL A EDITAR
                            
                            //SE FOR, SERÁ FEITO UM UPDATE NO BANCO COM A IMAGEM
                            $sql = "UPDATE tbl_ator SET nome_ator='".$nome."', nome_completo_ator='".$nome_completo."', imagem_ator='".$imagem."',
                            data_nascimento='".$dt_nasc."', ator_mes=".$ator_mes.", cod_pais=".$cod_pais." WHERE cod_ator=".$_SESSION['cod_ator'];
                        
                            //SE A CONEXÃO DER CERTO, IRÁ APAGAR A FOTO ANTIGA
                            if(mysqli_query($conexao, $sql)){
                                unlink('../img_atores/'.$_SESSION['nome_foto']);
                            }
                        } else {
                            echo("Erro no cadastro");
                        } 
 
                    }else {
                        echo("Erro ao enviar o arquivo para o servidor");
                    }
                    
                } else {
                    echo("Tamanho de arquivo inválido");
                }
                
            } else {
                echo("Extensão inválida");
            }
           

        } else {

            //UPDATE SEM A IMAGEM
            if($_POST['btn-cadastrar-ator'] == "Editar"){

                $sql = "UPDATE tbl_ator SET nome_ator='".$nome."', nome_completo_ator='".$nome_completo."',
                data_nascimento='".$dt_nasc."', ator_mes=".$ator_mes.", cod_pais=".$cod_pais." WHERE cod_ator=".$_SESSION['cod_ator'];
            
                mysqli_query($conexao, $sql);
                header('location:atores_crud.php');   
            } else {
                echo("<script> 
                        alert('Por favor, escolha uma foto');
                    </script>");

            }
        }
        
        echo("<script> window.location.href=(atores_crud.php) </script>");

        $salvar = false;
        $cod_pais = $cod_pais;
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
        

        
        <script type="text/javascript">
            $(document).ready(function() {
                $("#cadastro-atores").hide(); //NÃO EXIBIR O CADASTRO DE ATORES QUANDO CARREGAR A TELA
                $("#cadastro-atividades-ator").hide();//NÃO EXIBIR O CADASTRO DE ATIVIDADES DOS ATORES QUANDO CARREGAR A TELA
                $("#atores").click(MostrarCadastroAtor); //CHAMA A FUNÇÃO PARA EXIBIR O CADASTRO DE ATORES
                $("#atividades-ator").click(MostrarCadastroAtividadesAtor);//CHAMA A FUNÇÃO PARA EXIBIR O CADASTRO DE ATIVIDADES DOS ATORES
				$("#editar-atores").click(EditarAtores);//CHAMA A FUNÇÃO PARA EXIBIR O CADASTRO DE ATORES QUANDO O USUÁRIO QUISER ATUALIZAR ALGUM REGISTRO


            });
 
            function MostrarCadastroAtor(){
                $("#cadastro-atores").toggle();
            }
            
			function EditarAtores(){
				$("#cadastro-atores").show();
			}
            
            function MostrarCadastroAtividadesAtor(){
				$("#cadastro-atividades-ator").toggle();
			}

        </script>
		
		<?php 
		
			if(isset($_GET['modo'])){
				
				$modo = $_GET['modo'];
		
				if($modo == "buscar"){
					echo("<script type='text/javascript'>
				$(document).ready(function() {
					$('#cadastro-atores').show();
					});
			</script>");
				}
			}
		
		
		?>
        
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
                    <a href="cadastro_pais.php"><div class="itens-menu"> País </div></a>
                    <a href="cadastro_atividade.php"><div class="itens-menu"> Atividade </div></a>
                    <a href="produtos_crud.php"><div class="itens-menu"> Filmes </div></a>
                </div>
                
                <div id="caixa-menu"  style="margin-bottom:40px;">
                    <div class="menu">
                        <p class="titulo-menu" id="atores"> Cadastrar Atores e Atrizes</p>
                        
                            <div id="cadastro-atores">
                                <form name="frm-atores" method="post" action="atores_crud.php" enctype="multipart/form-data">

                                    <div id="caixa-imagem">
                                        <p> Imagem </p>
                                        <input type="file" name="fle-imagem"/>

                                        <?php 
                                        
                                            //verifica se a imagem existe para que ela seja exibida
                                            if(isset($imagem)){
                            
                                        ?>

                                        <div id="caixa-foto">
                                            <img src="../img_atores/<?php echo($imagem)?>" alt="">
                                        </div>

                                        <?php } else { ?> <div id="caixa-foto"> <img id="img" src="icon/image.png" alt=""> </div> <?php } ?>
                                    </div>

                                     <div class="caixa-info">
                                        <p> Data de Nascimento</p>
                                        <input type="text" name="txt-dt-nasc" id="dt_nasc" value="<?php echo($dt_nasc)?>" placeholder="Ex.: 26/07/1964" pattern="^\d{2}[/]\d{2}[/]\d{4}$" required onkeypress="return mascData(event);"/>
                                     </div>
                                    
                                     <div class="caixa-info"> 
                                        <p> Nome Completo </p>
                                        <input type="text" name="txt-nome-completo" id="nome-completo" value="<?php echo($nome_completo)?>" required onkeypress="return validarLetra(event);"/>
                                     </div>
                                    

                                    <div class="caixa-destaque">
                                        <p> Destaque como ator do mês </p>
                                        <?php 

                                            // selecr para trazer a quantidade de atores cadastrados como destaque
                                            $sql ="SELECT COUNT(ator_mes) AS quantidade_ator_mes FROM tbl_ator WHERE ator_mes=1";
                                            $select = mysqli_query($conexao, $sql);
                                            $rsator_mes = mysqli_fetch_array($select);
                                            $quantidade_ator_mes = $rsator_mes['quantidade_ator_mes'];

                                            // só será permitido cadastrar um ator como destaque se tiver menos de 6 atores já em destaque
                                            if($quantidade_ator_mes >= 6){
                                        ?>
                                        <select name="sle-ator-mes" required  style="margin-bottom: 10px;">
                                            <option value="0" <?php echo($ator_mes_desativo) ?>> Desativado </option>
                                        </select>
                                        <?php } else { ?>
                                        <select name="sle-ator-mes" required  style="margin-bottom: 10px;">
                                            <option value="1" <?php echo($ator_mes_ativo) ?>> Ativado </option>
                                            <option value="0" <?php echo($ator_mes_desativo) ?>> Desativado </option>
                                        </select>
                                        <?php }?>
                                        
                                       

                                        <p> Nacionalidade  </p>
                                        <select name="sle-pais" required>

                                        <?php 
                                            if($modo == "buscar"){
                                        ?>
                                            <option value="<?php echo($cod_pais) ?>"> <?php echo($pais) ?> </option>
                                        <?php }else if ($salvar == false){ 

                                            //select na tabela de pais
                                            $sql ="SELECT * FROM tbl_pais WHERE cod_pais=".$cod_pais." ORDER BY pais";
                                            $select = mysqli_query($conexao, $sql);
                                            $rspais= mysqli_fetch_array($select);   
                                        ?>

                                            <option value="<?php echo($cod_pais) ?>"> <?php echo($rspais["pais"]) ?> </option>
                                        <?php 

                                            }else{ ?>
                                            <option value=""> Selecione um país </option>
                                        <?php 

                                            }

                                            
                                            $sql ="SELECT * FROM tbl_pais WHERE cod_pais <>".$cod_pais." ORDER BY pais";
                                            $select = mysqli_query($conexao, $sql);

                                            while($rspaises = mysqli_fetch_array($select)){
                                        ?>

                                            <option value="<?php echo($rspaises['cod_pais']) ?>"> <?php echo($rspaises['pais']) ?> </option>

                                        <?php } ?>
                                        </select>
                                    </div>

                                    <div class="caixa-info" id="nome-ator"> 
                                        <p> Nome </p>
                                        <input type="text" name="txt-nome"  value="<?php echo($nome)?>" required onkeypress="return validarLetra(event);"/>
                                     </div>

                                    <input class="btn-cadastrar" type="submit" name="btn-cadastrar-ator" value="<?php echo($btn_modo) ?>"/>
                                </form>
                            </div>
                        
                        </div>

                    <div class="menu">
                        <p class="titulo-menu" id="atividades-ator"> Cadastrar Atividades dos Atores</p>

                        <div id="cadastro-atividades-ator">
                            <form name="frm-atividades-ator" method="post" action="atores_crud.php">
                                <div class="caixa-destaque"> 
                                    <p> Atividade </p>
                                    <select name="slt-atividade" required>
                                        <option value=""> Selecione uma atividade </option>
                                        
                                        <?php 
                                            $sql="SELECT * FROM tbl_atividade ORDER BY atividade";
                                            $select = mysqli_query($conexao, $sql);
                
                                            while($rsatividades = mysqli_fetch_array($select)){
                                        ?>
                                        <option value="<?php echo($rsatividades['cod_atividade']) ?>"> <?php echo($rsatividades['atividade']) ?> </option>
                                        <?php } ?>
                                    </select>

                                    <p> Ator/Atriz </p>
                                    <select name="slt-ator" required>
                                        <option value=""> Selecione um ator ou atriz</option>
                                        
                                        <?php
                                        
                                            // select na tabela de atores para ser exibido na tabela
                                            $sql="SELECT * FROM tbl_ator ORDER BY nome_ator";
                                            $select = mysqli_query($conexao, $sql);
                
                                            while($rsatores = mysqli_fetch_array($select)){
                                        ?>
                                        <option value="<?php echo($rsatores['cod_ator']) ?>"> <?php echo($rsatores['nome_ator']) ?> </option>
                                        <?php } ?>
                                    </select>
                                 </div>
                                
                                <input class="btn-cadastrar" type="submit" name="btn-cadastrar-atividadeator" value="<?php echo($btn_modo) ?>"/>

                            </form>
                        </div>
                    </div>
                </div>
                
                <table id="registros">
                    <tr>
                        <td class="titulo-coluna"> Nome </td>
                        <td class="titulo-coluna"> Data Nascimento </td>
                        <td class="titulo-coluna"> Imagem </td>
                    </tr>

                <?php

                    $sql = "SELECT * FROM tbl_ator";

                    $select = mysqli_query($conexao, $sql);    
                
                    while($rsregistros=mysqli_fetch_array($select)){
                ?>
                    <tr> 
                        <td class="dados-coluna"><?php echo($rsregistros['nome_ator']) ?></td>
                        <td class="dados-coluna"><?php echo(dataBrasileira($rsregistros['data_nascimento'])) ?></td>
                        <td class="dados-coluna" style="width: 150px;"><img src="../img_atores/<?php echo($rsregistros['imagem_ator']) ?>"> 
                        <td class="dados-coluna">
                            <figure id="icones">
                                <a href="atores_crud.php?modo=buscar&id=<?php echo($rsregistros['cod_ator']) ?>" id="editar-atores"> <img src="icon/edit.png" alt="Editar" title="Editar"> </a>
                                
                                <a href="atores_crud.php?ativo=<?php echo($rsregistros['ativo']) ?>&id=<?php echo($rsregistros['cod_ator']) ?>"> 
                                    <img src="<?php 
                                                    // exibir os icones de acordo com o ativo de cada registro
                                                    if($rsregistros['ativo'] == 0){ 
                                                        $icon_ativo = "Ator desativado";
                                                        echo('icon/cancel.png'); } 
                                                    else { 
                                                        $icon_ativo = "Ator ativado";
                                                        echo('icon/accept.png');}?>" alt="<?php echo($icon_ativo) ?>" title="<?php echo($icon_ativo) ?>" >
                                </a>

                                <a href="atores_crud.php?ator_mes=<?php echo($rsregistros['ator_mes']) ?>&id=<?php echo($rsregistros['cod_ator']) ?>"> 
                                    <img style="margin-left: 4px;" src="<?php 
                                                    // exibir os icones de acordo com o ativo de cada registro
                                                    if($rsregistros['ator_mes'] == 0){ 
                                                        $icon_ator_mes = "Ator em destaque desativado";
                                                        echo('icon/no_destaque.png'); } 
                                                    else { 
                                                        $icon_ator_mes = "Ator em destaque ativado";
                                                        echo('icon/destaque.png');}?>" alt="<?php echo($icon_ator_mes) ?>" title="<?php echo($icon_ator_mes) ?>" >
                                </a>
                                
                                <a href="atores_crud.php?modo=excluir&id=<?php echo($rsregistros['cod_ator'])?>" onclick="return confirm('Deseja realmente excluir esse registro?')"><img src="icon/trash.png" alt="Excluir" title="Excluir"></a>
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

        <script src="js/mascaras.js"></script>
        <script src="../js/validar.js"></script>
    </body>
</html>