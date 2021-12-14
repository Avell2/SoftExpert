<?php
require_once ("../../interface/cadastroInterface.php");
require_once ("../../conexao/Connection.php");

class cadastroProduto implements cadastroInterface {

    protected $Conexao;

    function __construct() {
        $this->Conexao = new Connection();
    }

    function create() {

        $erro = $this->validateCreate($_POST);

        if($erro == 0){
            $query = " ";
            $query .= " INSERT INTO produtos ( " . "\n";
            $query .= "    nome " . "\n";
            $query .= "    ,valor " . "\n";
            $query .= "    ,id_tipo_produto " . "\n";
            $query .= " ) VALUES ( " . "\n";
            $query .= " '".$_POST['Nome'] . "'\n";
            $query .= " ,'".$this->limpaPontos($_POST['preco']) . "'\n";
            $query .= " ,'".$_POST['tipo_produto'] . "'\n";
            $query .= " ) " . "\n";
            
            $stmt = $this->Conexao->dataConn->prepare($query);
            $stmt->execute();
            $dberr = $stmt->errorInfo();
            if (rtrim($dberr[0]) != '00000') {
                return $this->converteJson("Erro no cadastro");
            }
            else{
                return $this->converteJson("Inscerção realizada com sucesso");
            }

        }else{
            return $this->converteJson("Falha no cadastro");
        }

    }

    function validateCreate($val){

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

    function converteJson($val){
		header('Content-Type: application/json');
	
	
		print_r(json_encode($val));
	
	}

    function limpaPontos($valor){
		$valor = trim($valor);
		$valor = str_replace(".", "", $valor);
		$valor = str_replace(",", ".", $valor);
		$valor = str_replace("R$", "", $valor);
		$valor = str_replace(" ", "", $valor);
		return $valor;
	}



}
   
?> 
   