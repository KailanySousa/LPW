<?php 

 /*  explode() - busca um caracter padrão na String e automaticamente quebra a sua String em vetor, colocando cada informação encontrada em um indice
    separando por um determinado caracter

    no caso da data utilizamos a barra como o separador
*/

//função para transformar uma data no padrão americano para o padrão brasileiro
function dataBrasileira($dtamericana){

    $dtamericana = explode("-", $dtamericana);
    $dia = $dtamericana[2];
    $mes = $dtamericana[1];
    $ano = $dtamericana[0];

    $dtbrasileira = $dia."/".$mes."/".$ano;

    return $dtbrasileira;
}
  
//função para transformar uma data no padrão brasileiro para o padrão americano
function dataAmericana($dtbrasileira){

    $dtbrasileira = explode("/", $dtbrasileira);
    $dia = $dtbrasileira[0];
    $mes = $dtbrasileira[1];
    $ano = $dtbrasileira[2];

    $dtamericana = $ano."-".$mes."-".$dia;

    return $dtamericana;
}

?>