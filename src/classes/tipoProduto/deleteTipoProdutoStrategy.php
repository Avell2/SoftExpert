<?php
require_once ("../../interface/deleteInterface.php");
require_once ("../../conexao/Connection.php");

class deleteTipoProduto implements deleteInterface {

    protected $Conexao;

    function __construct() {
        $this->Conexao = new Connection();
    }

    function delete() {

        $query = "DELETE FROM tipos_produtos WHERE id_tipo_produto = ".$_POST['id_tipo_produto'];
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
   