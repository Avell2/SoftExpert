<?php
require_once ("../../interface/listagemInterface.php");
require_once ("../../conexao/Connection.php");

class listagemVenda implements listagemInterface {

    protected $Conexao;

    function __construct() {
        $this->Conexao = new Connection();
    }

    function listaTodos() {

        $query = "SELECT FORMAT (VE.valor_venda, 'c', 'pt-BR') as preco, data_venda FROM vendas AS VE
        JOIN vendaXproduto as VP ON VP.id_venda = VE.id_venda
        JOIN produtos as PR ON PR.id_produto = VP.id_produto
        ORDER BY PR.id_produto ASC";
        //print_r($query);die();
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
   