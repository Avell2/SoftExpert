<?php
require_once ("../../interface/deleteInterface.php");
require_once ("../../conexao/Connection.php");

class deletePercentual implements deleteInterface {

    protected $Conexao;

    function __construct() {
        $this->Conexao = new Connection();
    }

    function delete() {

        $query = "DELETE FROM valores_percentuais WHERE id_imposto = ".$_POST['id_impostos'];
        $stmt = $this->Conexao->dataConn->prepare($query);
        $stmt->execute();
        $dberr = $stmt->errorInfo();
        if (rtrim($dberr[0]) == '00000') {
            return $this->converteJson("Exclusão realizada com sucesso");
        } else {
            return $this->converteJson("Erro na deleção");
        }
    }

    function converteJson($val){
		header('Content-Type: application/json');
	
	
		print_r(json_encode($val));
	
	}




}
   
?> 
   