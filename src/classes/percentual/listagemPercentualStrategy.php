<?php
require_once ("../../interface/listagemInterface.php");
require_once ("../../conexao/Connection.php");

class listagemPercentual implements listagemInterface {

    protected $Conexao;

    function __construct() {
        $this->Conexao = new Connection();
    }

    function listaTodos() {

        $query = "SELECT * FROM valores_percentuais ORDER BY id_imposto ASC";
        $stmt = $this->Conexao->dataConn->prepare($query);
        $stmt->execute();
        $valores_percentuais = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->converteJson($valores_percentuais);
    }

    function listaOne() {

        $query = "SELECT * FROM valores_percentuais WHERE id_imposto = '".$_POST['id_imposto']."'";
        $stmt = $this->Conexao->dataConn->prepare($query);
        $stmt->execute();
        $valor_percentual = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->converteJson($valor_percentual);
    }

    function converteJson($val){
		header('Content-Type: application/json');
	
	
		print_r(json_encode($val));
	
	}




}
   
?> 
   