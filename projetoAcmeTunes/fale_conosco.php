<!doctype html>
<html lang="pt-br">
    <head>
        <title>
            Home
        </title>

        <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" type="text/css" href="css/fale_conosco.css">
        
        <meta charset="utf-8">
    </head>
    <body>
        <header>
            <?php require_once("menu.php")?>
        </header>
        
        <div id="caixa-conteudo" class="center">
            
            <div style="margin-left: 150px;" id="conteudo"> 
                
                <div id="caixa-fale-conosco"> 
                    <div id="titulo" class="center"> <h1>Fale Conosco </h1></div>
                    <div id="dados-usuario" class="center">
                        <h2 style="margin-top: 45px;text-align: center;"> Contato </h2>
                        <p style="margin-top: 10px;text-align: center;margin-bottom:10px;"> Deixe-nos saber como podemos ajudar, preencha os campos abaixo: </p>
                        
                        <div id="formulario" class="center">
                            <form name="frm-fale-conosco" method="post" action="">
                                <div id="caixa-nome">
                                     <input id="n" type="text" name="txt-nome" value="" placeholder="Digite seu nome..."/>
                                </div>
                                   
                                <div id="caixa-sexo">
                                    <label> Sexo: </label>
                                    <input type="radio" name="rdo-sexo" value="rdo-feminino"/> Feminino
                                    <input type="radio" name="rdo-sexo" value="rdo-masculino"/> Masculino
                                </div>
                                
                                <div id="caixa-telefone">
                                    <input class="telefone" type="tel" name="txt-telefone" value="" placeholder="Digite seu telefone..."/>
                                    
                                    <input class="telefone" style="margin-left: 10px;" type="tel" name="txt-celular" value="" placeholder="Digite seu celular..."/>
                                </div>
                                
                                <div id="caixa-email">                
                                    <input id="email" type="email" name="txt-email" value="" placeholder="Digite seu email..."/>
                                </div>
                                
                                <div id="caixa-sugestao">
                                    <textarea id="sugestao" name="txt-sugestoes" value="" placeholder="Digite aqui suas dúvidas, sugestões e/ou elogios"></textarea>
                                </div>
                                
                                <input id="btn-enviar" type="submit" name="txt-enviar" value="Enviar"/>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="center">
           
        </footer>

    </body>
</html>