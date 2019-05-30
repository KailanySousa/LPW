<?php 
    
    if(isset($_GET['codigo'])){
        
        require_once("../bd/conexao.php");
        $conexao = conexaoMysql();
        
        $codigo = $_GET['codigo'];
        
        $sql = "SELECT * FROM tbl_faleconosco WHERE codigo=".$codigo;
        
        $select = mysqli_query($conexao, $sql);
        
        if($rsregistro=mysqli_fetch_array($select)){
            $nome = $rsregistro['nome'];
            $profissao = $rsregistro['profissao'];
            
            if($rsregistro['sexo'] == "F"){
                $sexo = "Feminino"; 
            } else {
                $sexo = "Masculino";
            }
            
            $telefone = $rsregistro['telefone'];
            $celular = $rsregistro['celular'];
            $email = $rsregistro['email'];
            $facebook = $rsregistro['facebook'];
            $home_page = $rsregistro['home_page'];
            $info_produtos = $rsregistro['info_produtos'];
            $sugestao = $rsregistro['sugestao'];
        }
    }
?>

<script>
    $(document).ready(function(){

       $(".fechar-modal").click(function(){
          $("#container").toggle(400);
       });

    });
    
</script>

<div class="fechar-modal"> </div>
<h2> Registro Completo </h2>
<div id="info-registro" class="center">
    <div id="caixa-nome">
        <p> Nome </p>
        <div id="nome"> <?php echo($nome)?> </div>
    </div>
    
    <div id="caixa-profissao">
        <p> Profissão </p>
        <div id="profissao"> <?php echo($profissao)?> </div>
    </div>
    
    <div id="caixa-sexo">
        <p> Sexo </p>
        <div id="sexo"> <?php echo($sexo)?> </div>
    </div>
    
    <div class="caixa-telefones">
        <p> Telefone </p>
        <div class="telefones"> <?php echo($telefone)?> </div>
    </div>
    
    <div class="caixa-telefones" style="
    margin-left: 6px;">
        <p> Celular </p>
        <div class="telefones"> <?php echo($celular)?> </div>
    </div>
    
    <div id="caixa-email">
        <p> Email </p>
        <div id="email"> <?php echo($email)?> </div>
    </div>
    
     <div class="caixa-links">
        <p> Facebook </p>
        <div class="links"> <?php echo($facebook)?> </div>
    </div>
    
    <div class="caixa-links">
        <p> Home Page </p>
        <div class="links"> <?php echo($home_page)?> </div>
    </div>
    
    <div class="caixa-info-sugestao">
        <p> Informações de Produtos </p>
        <div class="links"> <?php echo($info_produtos)?> </div>
    </div>
    
    <div class="caixa-info-sugestao">
        <p> Sugestão </p>
        <div class="info-sugestao"> <?php echo($sugestao)?> </div>
    </div>
</div>