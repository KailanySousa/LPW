<?php 

    function calcularDesconto ($percentual, $preco){

    $preco = str_replace(",", ".", $preco);

    // valor do desconto em reais
    $desconto = $percentual * $preco / 100;

    // preco com o desconto
    $preco_desconto = $preco - $desconto;

    $preco_desconto = str_replace(".", ",", $preco_desconto);

    return $preco_desconto;

    }

?>