<?php
require_once ("../../interface/atualizaInterface.php");
require_once ("../../conexao/Connection.php");

class atualizaPercentual implements atualizaInterface {

    protected $Conexao;

    function __construct() {
        $this->Conexao = new Connection();
    }

    function update() {

        $erro = $this->validateUpdate($_POST);
        //print_r($erro);die();
        if($erro == 0){

            $query  = " UPDATE valores_percentuais SET  " . "\n";
            $query .= " nome = '".$_POST['Nome'] . "'\n";
            $query .= " ,percental = '".$_POST['percentual'] . "'\n";
            $query .= "    WHERE id_imposto = '".$_POST['id_imposto']."' " . "\n";
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

        if(empty($val['percentual'])){
            $erro++;
        }

        return $erro;

    }

    function converteJson($val){
		header('Content-Type: application/json');
	
	
		print_r(json_encode($val));
	
	}



}
   
?> 
   