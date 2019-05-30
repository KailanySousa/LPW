//PROCURA OS ELEMENTOS E ARMAZENA NAS VARIAVEIS
let cep = document.getElementById('txt-cep');
let dt_nasc = document.getElementById('dt_nasc');
let nome_completo = document.getElementById('nome-completo');
let nome = document.getElementById('nome-artistico');
let percentual = document.getElementById('percentual');
let ano = document.getElementById('txt-ano');
let preco = document.getElementById('txt-preco');

//FUNÇÃO PARA SÓ PERMITIR QUE LETRAS SEJAM DIGITADAS NA CAIXA NOME
function mascNome(){

    let texto = nome.value;

    texto = texto.replace(/[^a-zA-Z À-ÿ]/g,"");

    nome.value = texto;
}

function mascNomeCompleto(){

    let texto = nome_completo.value;

    texto = texto.replace(/[^a-zA-Z À-ÿ]/g,"");

    nome_completo.value = texto;
}

function mascNumero(){

    let texto = percentual.value;

    texto = texto.replace(/[^0-9]/g,"");

    percentual.value = texto;
}

function mascAno(){

    ano.maxLength = "4";
    let texto = ano.value;

    texto = texto.replace(/[^0-9]/g,"");

    ano.value = texto;
}

const mascCep = () =>{

    cep.maxLength = "9";
    let texto = cep.value;

    texto = texto.replace(/[^0-9]/g,"");

    texto = texto.replace(/(.{5})/,"$1-");

    cep.value = texto;
}

const mascData = () =>{


    dt_nasc.maxLength = "10";
    let texto = dt_nasc.value;

    texto = texto.replace(/[^0-9]/g,"");

    texto = texto.replace(/(.{2})/,"$1/");
    texto = texto.replace(/(.{5})/,"$1/");

    dt_nasc.value = texto;
}

function mascPreco(){

    preco.maxLength = "6";
    let texto = preco.value;

    texto = texto.replace(/[^0-9]/g,"");
    texto = texto.replace(/(.{2})/,"$1,");

    preco.value = texto;
}

//ADICIONA OS EVENTOS AS CAIXINHAS QUANDO UMA TECLA É PRESSIONADA
nome.addEventListener('keyup', mascNome);
nome_completo.addEventListener('keyup', mascNomeCompleto);
percentual.addEventListener('keyup', mascNumero);
cep.addEventListener('keyup', mascCep);
dt_nasc.addEventListener('keyup', mascData);
ano.addEventListener('keyup', mascAno);
preco.addEventListener('keyup', mascPreco);