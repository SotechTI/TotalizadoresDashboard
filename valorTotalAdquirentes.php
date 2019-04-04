<?php
//Para utilizar os totalizadores, basta passar os parâmetros desejado para cada função e descomentar aquela desejada

//VARIÁVES GLOBAIS E REQUISIÇÃO DE CLASSE
require_once 'classes/Funcoes.php'; //Classe onde possui funçoes para totalizar o banco
//Codigos das Adquirentes
$codAdquirentes = array('Bin' => 10, 'Cielo' => 11, 'Redecard' => 14, 'Userede' => 24);
//Nomes das Adquirentes
$nomeAdquirentes = array('10' => "Bin", '11' => "Cielo", '14' => "Redecard", '24' => "Userede");

$ano = date("Y");
$mes = "03";
$periodo = $ano."-".$mes;
$fun = new Funcoes(); //Objeto instanciado da Classe funcoes
###################################################################################################################################
//CHAMADA DE FUNÇÕES

//TOTALIZADOR DE VALOR TOTAL DE TRANSAÇÕES POR ADQUIRENTE
foreach ($nomeAdquirentes as $key => $value) {
    if($result = $fun->totalizarValorAdquirentes($nomeAdquirentes[$key], $codAdquirentes, $periodo)){
    echo "<br><pre> Adquirente '".$nomeAdquirentes[$key]."', no perido de '".$periodo."'... Totalizado Com Sucesso. </pre>";
    }else{
        echo $result;
    }
}






