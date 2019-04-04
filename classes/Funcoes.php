<?php
 require_once 'Conexao.php';
 
class Funcoes {
    
    private $con;
    
    function __construct() {
        $this->con = new Conexao();
        $this->con->conectar();
    }
      
   public function totalizarValorAdquirentes($nomeAdquirente, $codAdquirentes, $periodo){
           $sql = "SELECT SUM(transacao_valor) FROM `cadastro_transacoes_tef` "
               . "WHERE rede LIKE '$nomeAdquirente%' AND transacao_inicio LIKE '$periodo%'";
           $result = $this->con->conexao->query($sql);
           
           if($row = mysqli_fetch_assoc($result)){
               $valorTotal = $row['SUM(transacao_valor)'];
               $sqlInsert = "INSERT INTO valorTotalRede (id, idAdquirente, periodo, valor) "
                       . "VALUES ('', '".$codAdquirentes[$nomeAdquirente]."', '$periodo', '$valorTotal')";
               if($this->con->conexao->query($sqlInsert)){
                   return true;
               }else{
                   return $this->con->conexao->error;
               }
           }         
    }
   public function buscarValorBandeirasAdquirente($adquirente, $tipoCartao, $administrador, $periodo) {
       $sql = "SELECT SUM(transacao_valor) FROM `cadastro_transacoes_tef` WHERE  (rede LIKE '$adquirente%') "
               . "AND (tipo_cartao = '$tipoCartao') AND administrador LIKE '$administrador%' AND transacao_inicio LIKE '$periodo%'";
       $result = $this->con->conexao->query($sql);
       
       $row = mysqli_fetch_assoc($result);
       
       return $valorTotal = $row['SUM(transacao_valor)'];
   }
    
    function getCon() {
        return $this->con;
    }

    function setCon($con) {
        $this->con = $con;
    }
}
