<?php
require_once ("../../interface/cadastroInterface.php");
require_once ("../../conexao/Connection.php");

class cadastroPercentual implements cadastroInterface {

    protected $Conexao;

    function __construct() {
        $this->Conexao = new Connection();
    }

    function create() {
        $erro = $this->validateCreate($_POST);

        if($erro == 0){

            $query = " ";
            $query .= " INSERT INTO valores_percentuais ( " . "\n";
            $query .= "    nome " . "\n";
            $query .= "   , percental " . "\n";
            $query .= " ) VALUES ( " . "\n";
            $query .= " '".$_POST['Nome'] . "'\n";
            $query .= " ,'".$_POST['percentual'] . "'\n";
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
   