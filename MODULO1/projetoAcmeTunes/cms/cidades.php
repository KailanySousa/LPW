<?php 

   require_once("../bd/conexao.php");
   $conexao = conexaoMysql();
   
   if(isset($_GET['codigo'])){

      $codigo = $_GET['codigo'];

      $sql = "SELECT * FROM tbl_cidade WHERE cod_estado=".$codigo." ORDER BY cidade";

      $select = mysqli_query($conexao, $sql);

      while($rscidades = mysqli_fetch_array($select)){
         
         $cod_cidade = $rscidades['cod_cidade'];
         $cidade = $rscidades['cidade'];

         echo("<option value=".$cod_cidade.">".$cidade."</option>");
      }
   }


?>