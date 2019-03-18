let telefone = document.getElementById('txt-telefone');
let celular = document.getElementById('txt-celular');
let nome = document.getElementById('txt-nome');

const mascNome = () =>{

    let texto = nome.value;

    texto = texto.replace(/[^a-zA-Z À-ÿ]/g,"");

    nome.value = texto;
}

function mascCelular(){


    celular.maxLength = "14";

    let texto = celular.value;

    texto = texto.replace(/[^0-9]/g,"");

    texto = texto.replace(/(.)/,"($1")

    texto = texto.replace(/(...)/,"$1)")

    texto = texto.replace(/(.{9})/,"$1-")

    celular.value = texto;

}

function mascTelefone (){


    telefone.maxLength = "13";

    let texto = telefone.value;

    texto = texto.replace(/[^0-9]/g,"");

    texto = texto.replace(/(.)/,"($1")

    texto = texto.replace(/(...)/,"$1)")

    texto = texto.replace(/(.{8})/,"$1-")

    telefone.value = texto;

}

nome.addEventListener('keyup', mascNome);
celular.addEventListener('keyup', mascCelular);
telefone.addEventListener('keyup', mascTelefone);