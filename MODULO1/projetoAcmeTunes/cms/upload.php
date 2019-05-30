<?php 

    if(isset($_POST)){

        session_start();

        if(!empty($_FILES['fle-foto']['name'])){

            $arquivos_permitidos = array(".jpg", ".jpeg", ".png");
            
            $diretorio = "../img_filmes/";
            
            $arquivo = $_FILES['fle-foto']['name'];
            
            $tamanho_arquivo = $_FILES['fle-foto']['size'];
            
            $tamanho_arquivo = round($tamanho_arquivo/1024);
            
            $extensao_arquivo = strrchr($arquivo, ".");
            
            $nome_arquivo = pathinfo($arquivo, PATHINFO_FILENAME);
            
            $arquivo_criptografado = md5(uniqid(time().$nome_arquivo));
            
            $foto = $arquivo_criptografado . $extensao_arquivo;
            
            if(in_array( $extensao_arquivo,$arquivos_permitidos)){
                
                if($tamanho_arquivo <= 5000){
                    
                    $arquivo_temp = $_FILES['fle-foto']['tmp_name'];
                    
                    if(move_uploaded_file($arquivo_temp, $diretorio . $foto)){
                        
                       $_SESSION['path_foto'] = $foto;

                       echo("<img src='../img_filmes/".$_SESSION['path_foto']."'>");
                        
                    }else {
                        echo("Erro ao enviar o arquivo para o servidor");
                    }
                    
                } else {
                    echo("Tamanho de arquivo inválido");
                }
                
            } else {
                echo("Extensão inválida");
            }

        }
        
        
    }
