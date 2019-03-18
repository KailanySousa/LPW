<?php 

    function conexaoMysql(){
    
    /*
        mysql_connect() - biblioteca de conexão com BD mysql, vigente até o php 5.6

        mysqli() - biblioteca de conexão com BD mysql, vigente até as versões atuais

        PDO - biblioteca de conexão com BD mysql, mais utilizada em projetos de Orientação a Objetos 
    */

        //variavel que vai receber a conexão com o BD
        $conexao = null;

        //variaveis para estabelecer a conexão com o BD
        $server = "localhost"; //para uma conexão remota seria colocado o ip do servidor
        $user = "root";
        $password="bcd127";
        $database = "db_locadora";

        $conexao = mysqli_connect($server, $user, $password, $database);
        
        return $conexao;

    }

?>