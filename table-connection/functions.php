<?php
//Função para tratamento da data
function dataTela($data) { //aaaa-mm-dd => dd/mm/aaaa
    $data = explode("-", $data);
    $data = array_reverse($data);
    $data = implode("/",$data);

    return $data; //Retorna para quem chamar
}

function dataBanco($data) { //dd/mm/aaaa => aaaa-mm-dd
    $dtnasc = explode("/", $dtnasc);
    $dtnasc = array_reverse($dtnasc);
    $dtnasc = implode("-", $dtnasc);

    return $data; //Retorna para quem chamar
}

?>
