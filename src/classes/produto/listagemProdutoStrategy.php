<?php
require_once ("../../interface/listagemInterface.php");
require_once ("../../conexao/Connection.php");

class listagemProduto implements listagemInterface {

    protected $Conexao;

    function __construct() {
        $this->Conexao = new Connection();
    }

    function listaTodos() {

        $query = "SELECT  FORMAT (PR.valor, 'c', 'pt-BR') as preco, PR.*, TP.tipo_nome as tipo_produto FROM produtos AS PR
        JOIN tipos_produtos as TP ON PR.id_tipo_produto = TP.id_tipo_produto
        ORDER BY id_produto ASC";
        $stmt = $this->Conexao->dataConn->prepare($query);
        $stmt->execute();
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->converteJson($produtos);
    }

    function listaOne() {

        $query = "SELECT FORMAT (PR.valor, 'c', 'pt-BR') as preco, PR.* FROM produtos AS PR WHERE id_produto = '".$_POST['id_produto']."'";
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
   