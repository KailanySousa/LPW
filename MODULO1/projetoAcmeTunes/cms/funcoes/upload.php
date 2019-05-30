<?php 


    if(isset($_POST)){
      
        session_start();

        // verifica se existe um arquivo selecionado no elemento files
        if(!empty($_FILES['fle-fotos']['name'])){ //se FILES for diferente de vazio

            // Arquivos permitidos no upload
            $arquivos_permitidos = array(".jpg", ".jpeg", ".png");
            
            // $_FILES é usado para resgatar um objeto, no caso o objeto file, retornando um array com informações do arquivo, como nome, tipo, tamanho, lugar onde será salvo
            // Nome do arquivo a ser upado para o servidor
            $arquivo = $_FILES['fle-fotos']['name']; 
            
            //Tamanho do arquivo a ser upado para o servidor
            $tamanho_arquivo = $_FILES['fle-fotos']['size']; 
            
            // Transforma o tamanho do arquivo de bytes em kbytes para facilitar o tratamento de tamanho de arquivod 
            $tamanho_arquivo = round($tamanho_arquivo/1024); //round() - arredonda um valor para inteiro
            
            // Guarda somente a extensão do arquivo
            $extensao_arquivo = strrchr($arquivo, "."); //strrchr() - busca em uma string um caracter especifico do fim para o começo
            
            // Guarda somente o nome do arquivo, sem a extensão, utilizando a função pathinfo();
            $nome_arquivo = pathinfo($arquivo, PATHINFO_FILENAME);
            
            /*  
                Realiza a criptografia do nome do arquivo, podemos utilizar md5 ou sha1
                uniqid - gera uma sequencia numerica aleatória, baseado em informações de hardware, 
                porém estamos agregando hora, minuto e segura para gerar um hash tootalmente unica
            */
            
            $arquivo_criptografado = md5(uniqid(time()).$nome_arquivo); //md5 modelo de criptografia seguro
            
            // Juntando o nome do arquivo já criptografado com a extensão que será enviada para o servidor 
            $foto = $arquivo_criptografado . $extensao_arquivo;
            
            // Validação das extensões de arquivos permitidos
            if(in_array($extensao_arquivo, $arquivos_permitidos)){
                // Validação de tamanho de arquivo (Limite de 5MB)
                if($tamanho_arquivo <= 5000){
                    // Caminho do diretório temporario que a imagem foi guardada pelo servidor
                    $arquivo_temp = $_FILES['fle-fotos']['tmp_name'];
                    
                    if(move_uploaded_file($arquivo_temp, $diretorio . $foto)){

                        $_SESSION['path_foto'] = $foto;

                        echo("<img src='arquivos/".$_SESSION['path_foto']."'>");

                    } else {
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
