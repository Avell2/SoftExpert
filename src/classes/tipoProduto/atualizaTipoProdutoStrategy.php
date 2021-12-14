<?php
require_once ("../../interface/atualizaInterface.php");
require_once ("../../conexao/Connection.php");

class atualizaTipoProduto implements atualizaInterface {

    protected $Conexao;

    function __construct() {
        $this->Conexao = new Connection();
    }

    function update() {

        $erro = $this->validateUpdate($_POST);
        if($erro == 0){

            $query  = " UPDATE tipos_produtos SET  " . "\n";
            $query .= " tipo_nome = '".$_POST['Nome'] . "'\n";
            $query .= " ,id_imposto = '".$_POST['percentual']. "'\n";
            $query .= "    WHERE id_tipo_produto = '".$_POST['id_tipo_produto']."' " . "\n";
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
   