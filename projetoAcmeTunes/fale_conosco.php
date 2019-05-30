<?php 

    require_once("bd/conexao.php");
    $conexao = conexaoMysql();

    if(isset($_POST['txt-enviar'])){
        
        $nome = $_POST['txt-nome'];
        $profissao = $_POST['txt-profissao'];
        $sexo = $_POST['slt-sexo'];
        $telefone = $_POST['txt-telefone'];
        $celular = $_POST['txt-celular'];
        $email = $_POST['txt-email'];
        $fb = $_POST['txt-fb'];
        $home_page = $_POST['txt-home-page'];
        $info_produtos = $_POST['txt-info-produtos'];
        $sugestoes = $_POST['txt-sugestoes'];
        
        $sql = "INSERT INTO tbl_faleconosco (nome, profissao, sexo, telefone, celular, email, facebook, home_page, info_produtos, sugestao) VALUES ('".$nome."', '".$profissao."', '".$sexo."', '".$telefone."', '".$celular."', '".$email."', '".$fb."', '".$home_page."', '".$info_produtos."', '".$sugestoes."')";
        
        mysqli_query($conexao, $sql);
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Fale Conosco
        </title>

        <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" type="text/css" href="css/fale_conosco.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <script src="js/jquery.js"></script>
        <meta charset="utf-8">
    </head>
    <body>
        <header>
            <?php require_once("menu.php")?>
        </header>
        
        <div id="caixa-conteudo" class="center">
            
            <div id="conteudo"> 
                
                <div id="caixa-fale-conosco"> 
                    <div id="titulo" class="center"> <h1>Fale Conosco </h1></div>
                    <div id="dados-usuario" class="center">
                        <p style="margin-top: 10px;text-align: center;margin-bottom:10px;"> Deixe-nos saber como podemos ajudar, preencha os campos abaixo: </p>
                        
                        <div id="formulario" class="center">
                            <form name="frm-fale-conosco" method="post" action="fale_conosco.php">
                                
                                <input id="txt-nome" class="style-input" type="text" name="txt-nome" value="" required placeholder="Nome"/>
                                
                                <input id="profissao" class="style-input" type="text" name="txt-profissao" value="" required placeholder="Profissão"/>
                                
                                <div id="caixa-sexo">
                                    <select id="slt-sexo" class="style-input" name="slt-sexo" required>
                                        <option value="" selected> Selecione o sexo</option>
                                        <option value="F"> Feminino </option>
                                        <option value="M"> Masculino </option>
                                    </select>

                                </div>
                                <div id="caixa-telefone">
                                    <input class="telefone style-input" type="tel" name="txt-telefone" id="txt-telefone" value="" placeholder="Telefone" pattern="^[(]\d{2}[)]\d{4}-\d{4}$"/>
                                    
                                    <input class="telefone style-input" style="margin-left: 8px;" type="tel" name="txt-celular" id="txt-celular" value="" required placeholder="Celular" pattern="^[(]\d{2}[)]\d{5}-\d{4}$">
                                </div>
                                
                                <div id="caixa-email">                
                                    <input id="email" class="style-input" type="email" name="txt-email" value="" required placeholder="Email"/>
                                </div>
                                
                                <div id="caixa-links">
                                    <div class="links" style="margin-right: 8px;">
                                        <input class="links-input style-input" type="url" name="txt-fb" value="" placeholder="Facebook"/>
                                    </div>
                                    <div class="links">
                                        <input class="links-input style-input" type="url" name="txt-home-page" value="" placeholder="Home Page"/>
                                    </div>
                                
                                </div>
                                
                                <div id="caixa-info-produto">
                                    <textarea id="info-produtos" class="style-input" name="txt-info-produtos" placeholder="Informações de Produtos"></textarea>
                                </div>
                                
                                <div id="caixa-sugestao">
                                    <textarea id="sugestao" class="style-input" name="txt-sugestoes" placeholder="Dúvidas, sugestões e/ou elogios"></textarea>
                                </div>
                                
                                <input id="btn-enviar" type="submit" name="txt-enviar" value="Enviar"/>
                            </form>
                        </div>
                    </div>
                    
                    <div id="titulo-contato"> <h3>Entre em contato</h3> </div>
                    <div id="empresa-info">
                        
                        <div class="endereco-empresa">
                            <p> (11) 98547-5879 </p>
                            <p> (11) 94635-7854 </p>
                            <p> acme_tunes@gmail.com</p>
                        </div>
                        <div class="endereco-empresa"> 
                            <p> Acme Tunes SA </p>
                            <p> Rua Luis Carlos Berini, n°666 </p>
                            <p> Jandira - SP </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
           <?php require_once("footer.php") ?>
        </footer>
    
        <script src="js/mascaras.js"></script>
        
    </body>
</html>