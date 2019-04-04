<?php
//Para utilizar os totalizadores, basta passar os parâmetros desejado para cada função e descomentar aquela desejada

//VARIÁVES GLOBAIS E REQUISIÇÃO DE CLASSE
require_once 'classes/Funcoes.php'; //Classe onde possui funçoes para totalizar o banco
//Codigos das Adquirentes
$codAdquirentes = array('Bin' => 10, 'Cielo' => 11, 'Redecard' => 14, 'Userede' => 24);
//Nomes das Adquirentes
$nomeAdquirentes = array(10 => "Bin", 11 => "Cielo", 14 => "Redecard", 24 => "Userede");

$tipoCartao = array(1 => "Crédito", 2 => "Débito");

$nomeBandeiras = array(1 => "Amex", 2 => "Elo", 3 => "Hiper", 4 => "Master", 5 => "Visa");

$ano = date("Y")-1;
$mes = "08";
$periodo = $ano."-".$mes;
$fun = new Funcoes(); //Objeto instanciado da Classe funcoes
foreach ($tipoCartao as $keyTipoCartao => $valueTipoCartao) {
    foreach ($nomeAdquirentes as $keyAdquirente => $valueAdquirente) {
        foreach ($nomeBandeiras as $key => $value) {
            $valorTotal = $fun->buscarValorBandeirasAdquirente($nomeAdquirentes[$keyAdquirente], $tipoCartao[$keyTipoCartao], $nomeBandeiras[$key], $periodo);
            if($resultInsert = $fun->totalizarValorBandeirasAdquirente($keyAdquirente, $key, $keyTipoCartao, $periodo, $valorTotal)){
                echo "<br>Tipo de Transacao <strong>".$tipoCartao[$keyTipoCartao]. "</strong> da Bandeira <strong>".$nomeBandeiras[$key]. "</strong> na adquirente <strong>".$nomeAdquirentes[$keyAdquirente]. " </strong> realizado com sucesso";
            }else{
                echo "<pre>" .$resultInsert. "</pre>";
            }
        }
    }
}


