//FUNÇÃO QUE NÃO PERMITE ENTRADA DE LETRAS, SÓ NUMEROS
function validarNumero(caracter){
    let letra;

    //VERIFICA SE O EVENTO DA TECLA DIGITADA É PROVENIENTE DE UMA AÇÃO DE JANELA
    if(window.Event){
        //TRANFORMA A TECLA DIGITADA PARA ASCII
        letra = caracter.charCode 
    }else{
        //TRANFORMA A TECLA DIGITADA PARA ASCII
        letra = caracter.which;
    }

    //VERIFICA ATRAVES DA TABELA ASCII SE A DIGITAÇÃO ESTA ENTRE 48 E 57, QUE CORRESPONDE AOS NUMERO DE 0 A 9
    if(letra < 48 || letra > 57){
        //LIBERA APENAS O PONTO PARA DIGITAÇÃO
        if(letra != 46){
            return false;
        }
    }
}

function validarLetra(caracter){
    let letra;

    //VERIFICA SE O EVENTO DA TECLA DIGITADA É PROVENIENTE DE UMA AÇÃO DE JANELA
    if(window.Event){
        //TRANFORMA A TECLA DIGITADA PARA ASCII
        letra = caracter.charCode 
    }else{
        //TRANFORMA A TECLA DIGITADA PARA ASCII
        letra = caracter.which;
    }

    if(letra != 32){
       //VERIFICA ATRAVES DA TABELA ASCII SE A DIGITAÇÃO ESTA ENTRE 65 E 90, QUE CORRESPONDE AS LETRAS de A e Z
        if(letra < 65 || letra > 90){

            //VERIFICA ATRAVES DA TABELA ASCII SE A DIGITAÇÃO ESTA ENTRE 65 E 90, QUE CORRESPONDE AS LETRAS de a e z
            if(letra < 97 || letra > 122){

                //VERIFICA ATRAVES DA TABELA ASCII SE A DIGITAÇÃO ESTA ENTRE 142 E 237, QUE CORRESPONDE AS LETRAS COM ACENTO
                if(letra < 128 || letra > 237){
                    return false;
                }
            }
        } 
    }
    
}
