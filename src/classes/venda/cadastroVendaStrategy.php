<?php
require_once ("../../interface/cadastroInterface.php");
require_once ("../../conexao/Connection.php");

class cadastroVenda implements cadastroInterface {

    protected $Conexao;

    function __construct() {
        $this->Conexao = new Connection();
    }

    function create() {

        $erro = $this->validateCreate($_POST);
        if($erro['num_erros'] == 0){
            $n_count = count($_POST['produtoFinal']);
            for($i = 0; $i < $n_count; $i++){

                $query = " ";
                $query .= " INSERT INTO vendas ( " . "\n";
                $query .= "    valor_venda " . "\n";
                $query .= " ) VALUES ( " . "\n";
                $query .= " '".$_POST['valor_venda']."'\n";
                $query .= " ) " . "\n";
                
                $stmt = $this->Conexao->dataConn->prepare($query);
                $stmt->execute();
                $id_venda = $this->Conexao->dataConn->lastInsertId();
                $vp = $this->insertVendaProduto($id_venda, $_POST['produtoFinal'][$i]);
                if($vp){
                    $dberr = $stmt->errorInfo();
                    if (rtrim($dberr[0]) != '00000') {
                        return $this->converteJson("Erro no cadastro");
                    }
                    else{
                        return $this->converteJson($erro['msg']);
                    }
                }else{
                    return $this->converteJson("Falha no cadastro");
                }
            }
            

        }else{
            return $this->converteJson($erro['msg']);
        }

    }

    function validateCreate($val){
        $erro['num_erros'] = 0;
        $erro['msg'] = '';
        $n_count = count($_POST['produtoFinal']);
        for($i = 0; $i < $n_count; $i++){
            if(empty($_POST['produtoFinal'][$i])){
                $erro['num_erros']++;
                $erro['msg'] .= 'Cheque Produtos';
            }
            if(empty($_POST['qtd'][$i]) || $_POST['qtd'][$i] <= 0){
                $erro['num_erros']++;
                $erro['msg'] .= ', Cheque quantidade';
            }
        }

        if(empty($_POST['valor_venda'])){
            $erro['num_erros']++;
            $erro['msg'] .= ', Cheque Valores';
        }

        if($erro['num_erros'] == 0){
            $erro['msg'] = "Inscerção realizada com sucesso";
        }
        return $erro;
    }

    function converteJson($val){
		header('Content-Type: application/json');
	
	
		print_r(json_encode($val));
	}

    function insertVendaProduto($id_venda, $produtoFinal){
        $query = " ";
            $query .= " INSERT INTO vendaXproduto ( " . "\n";
            $query .= "    id_venda " . "\n";
            $query .= "   ,id_produto " . "\n";
            $query .= " ) VALUES ( " . "\n";
            $query .= " '".$id_venda."'\n";
            $query .= " ,'".$produtoFinal."'\n";
        $query .= " ) " . "\n";

        $stmt = $this->Conexao->dataConn->prepare($query);
        $stmt->execute();
        $dberr = $stmt->errorInfo();
        if (rtrim($dberr[0]) != '00000') {
            return false;
        }
        else{
            return true;
        }
    }



}
   
?> 
   