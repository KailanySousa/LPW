//PROCURA OS ELEMENTOS E ARMAZENA NAS VARIAVEIS
let telefone = document.getElementById('txt-telefone');
let celular = document.getElementById('txt-celular');
let nome = document.getElementById('txt-nome');
let cep = document.getElementById('txt-cep');

//FUNÇÃO PARA SÓ PERMITIR QUE LETRAS SEJAM DIGITADAS NA CAIXA NOME
function mascNome(){

    let texto = nome.value;

    texto = texto.replace(/[^a-zA-Z À-ÿ]/g,"");

    nome.value = texto;
}

//FUNÇÃO PARA SÓ PERMITIR QUE NUMEROS SEJAM DIGITADOS NA CAIXA CELULAR, E COM UM PADRÃO ESPECIFICO
function mascCelular(){

    celular.maxLength = "14";

    let texto = celular.value;

    texto = texto.replace(/[^0-9]/g,"");

    texto = texto.replace(/(.)/,"($1")

    texto = texto.replace(/(...)/,"$1)")

    texto = texto.replace(/(.{9})/,"$1-")

    celular.value = texto;

}

//FUNÇÃO PARA SÓ PERMITIR QUE NUMEROS SEJAM DIGITADOS NA CAIXA TELEFONE, E COM UM PADRÃO ESPECIFICO
function mascTelefone (){
    
    telefone.maxLength = "13";

    let texto = telefone.value;

    texto = texto.replace(/[^0-9]/g,"");

    texto = texto.replace(/(.)/,"($1")

    texto = texto.replace(/(...)/,"$1)")

    texto = texto.replace(/(.{8})/,"$1-")

    telefone.value = texto;

}

const mascCep = () =>{

    cep.maxLength = "9";
    let texto = cep.value;

    texto = texto.replace(/[^0-9]/g,"");

    texto = texto.replace(/(.{5})/,"$1-");

    cep.value = texto;
}

//ADICIONA OS EVENTOS AS CAIXINHAS QUANDO UMA TECLA É PRESSIONADA
nome.addEventListener('keyup', mascNome);
celular.addEventListener('keyup', mascCelular);
telefone.addEventListener('keyup', mascTelefone);
cep.addEventListener('keyup', mascCep);