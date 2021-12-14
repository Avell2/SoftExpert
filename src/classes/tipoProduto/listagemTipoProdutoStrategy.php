<?php
require_once ("../../interface/listagemInterface.php");
require_once ("../../conexao/Connection.php");

class listagemTipoProduto implements listagemInterface {

    protected $Conexao;

    function __construct() {
        $this->Conexao = new Connection();
    }

    function listaTodos() {

        $query = "SELECT TP.*, VP.nome as imposto FROM tipos_produtos AS TP
        JOIN valores_percentuais as VP ON VP.id_imposto = TP.id_imposto
        ORDER BY id_tipo_produto ASC";
        $stmt = $this->Conexao->dataConn->prepare($query);
        $stmt->execute();
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->converteJson($produtos);
    }

    function listaOne() {

        $query = "SELECT TP.*, VP.percental as imposto FROM tipos_produtos AS TP
        JOIN valores_percentuais as VP ON VP.id_imposto = TP.id_imposto
        WHERE id_tipo_produto = '".$_POST['id_tipo_produto']."' ORDER BY id_tipo_produto ASC";
        $stmt = $this->Conexao->dataConn->prepare($query);
        $stmt->execute();
        $valor_percentual = $stmt->fetch(PDO::FETCH_ASSOC);
        return $this->converteJson($valor_percentual);
    }

    function converteJson($val){
		header('Content-Type: application/json');
	
	
		print_r(json_encode($val));
	}




}
   
?> 
   