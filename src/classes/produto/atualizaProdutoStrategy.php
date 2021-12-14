<?php
require_once ("../../interface/atualizaInterface.php");
require_once ("../../conexao/Connection.php");

class atualizaProduto implements atualizaInterface {

    protected $Conexao;

    function __construct() {
        $this->Conexao = new Connection();
    }

    function update() {

        $erro = $this->validateUpdate($_POST);

        if($erro == 0){

            $query  = " UPDATE produtos SET  " . "\n";
            $query .= " nome = '".$_POST['Nome'] . "'\n";
            $query .= " ,valor = '".$this->limpaPontos($_POST['preco']) . "'\n";
            $query .= " ,id_tipo_produto = '".$_POST['tipo_produto'] . "'\n";
            $query .= "    WHERE id_produto = '".$_POST['id_produto']."' " . "\n";
            $stmt = $this->Conexao->dataConn->prepare($query);
            $stmt->execute();
            $dberr = $stmt->errorInfo();
            if (rtrim($dberr[0]) != '00000') {
                return $this->converteJson("Erro no cadastro");
            }
            else{
                return $this->converteJson("Atualização realizada com sucesso");
            }

        }else{
            return $this->converteJson("Falha no cadastro");
        }

    }

    function validateUpdate($val){

        $erro = 0;
        if(empty($val['Nome'])){
            $erro++;
        }

        if(empty($val['tipo_produto'])){
            $erro++;
        }

        if(empty($val['preco'])){
            $erro++;
        }

        return $erro;

    }

    function limpaPontos($valor){
		$valor = trim($valor);
		$valor = str_replace(".", "", $valor);
		$valor = str_replace(",", ".", $valor);
		$valor = str_replace("R$", "", $valor);
		$valor = str_replace(" ", "", $valor);
		return $valor;
	}

    function converteJson($val){
		header('Content-Type: application/json');
	
	
		print_r(json_encode($val));
	
	}



}
   
?> 
   