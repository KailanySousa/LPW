<div id="caixa-cabecalho" class="center">
    <div id="logo">
        <div id="imagem-logo"> </div>
        <div id="nome"> Acme Tunes </div>
    </div>
    <nav id="menu">
         <a href="index.php"><div class="menu-itens"> Home </div></a>
        <div class="menu-itens"> Destaques
            <div class="submenu"> 
                <a href="promocao.php"><div class="submenu-itens"> Promoções </div></a>
                <a href="filme_mes.php"><div class="submenu-itens" style="box-sizing; padding-top:5px;"> Filme do Mês </div></a>
            </div>
        </div>
        <a href="atores.php"><div class="menu-itens"> Atores</div></a>
        <div class="menu-itens"> A Acme
            <div class="submenu"> 
                <div class="submenu-itens"> Lojas </div>
                <a href="sobre.php"><div class="submenu-itens"> Sobre </div></a>
                <a href="fale_conosco.php"><div class="submenu-itens"  style="box-sizing; padding-top:5px;"> Fale Conosco</div></a>
            </div>
        </div>
    </nav>
    <div id="login">
        <form name="frm_login" method="post" action="index.php"> 
            <div class="caixa-login">
                <p class="lbl-login"> Usuário: </p>
                <input class="txt-login" type="text" name="txt_usuario" value=""/>
            </div>

            <div class="caixa-login">
                <p class="lbl-login"> Senha: </p>
                <input class="txt-login" type="text" name="txt_senha" value=""/>
            </div>

            <input id="btn-entrar" type="submit" name="btn_entrar" value="Entrar"/>
        </form>
    </div>
</div>