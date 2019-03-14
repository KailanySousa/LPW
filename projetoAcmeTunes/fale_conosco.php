<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Fale Conosco
        </title>

        <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" type="text/css" href="css/fale_conosco.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <script src="js/ancora.js"></script>
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
                            <form name="frm-fale-conosco" method="post" action="">
                                <div id="caixa-nome">
                                     <input id="n" type="text" name="txt-nome" value="" placeholder="Nome"/>
                                </div>
                                <div id="caixa-profissao">
                                    <input id="profissao" type="text" name="txt-profissao" value="" placeholder="Profissão"/>
                                </div>
                                <div id="caixa-sexo">
                                    <select id="slt-sexo" name="slt-sexo">
                                        <option value="" selected> Selecione o sexo</option>
                                        <option value="F"> Feminino </option>
                                        <option value="M"> Masculino </option>
                                    </select>

                                </div>
                                <div id="caixa-telefone">
                                    <input class="telefone" type="tel" name="txt-telefone" value="" placeholder="Telefone"/>
                                    
                                    <input class="telefone" style="margin-left: 10px;" type="tel" name="txt-celular" value="" placeholder="Celular"/>
                                </div>
                                
                                <div id="caixa-email">                
                                    <input id="email" type="email" name="txt-email" value="" placeholder="Email"/>
                                </div>
                                
                                <div id="caixa-links">
                                    <div class="links" style="margin-right: 8px;">
                                        <input class="links-input" type="url" name="txt-fb" value="" placeholder="Facebook"/>
                                    </div>
                                    <div class="links">
                                        <input class="links-input" type="url" name="txt-home-page" value="" placeholder="Home Page"/>
                                    </div>
                                
                                </div>
                                
                                <div id="caixa-info-produto">
                                    <textarea id="info-produtos" name="txt-info-produtos" placeholder="Informações de Produtos"></textarea>
                                </div>
                                
                                <div id="caixa-sugestao">
                                    <textarea id="sugestao" name="txt-sugestoes" placeholder="Dúvidas, sugestões e/ou elogios"></textarea>
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
        <footer class="center">
           <?php require_once("footer.php") ?>
        </footer>

    </body>
</html>