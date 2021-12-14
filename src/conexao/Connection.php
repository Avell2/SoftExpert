<?php

final class Connection {


    private $host = "DESKTOP-GQITI2K\SQLEXPRESS";//subistituir
    private $db_name = "SoftExpert";
    private $username = "epp";
    private $password = "drag1Q2W";

	
	
    public $dataConn = false;

    public function __construct() {
        $saida = true;

        try {
			$this->dataConn = new PDO("sqlsrv:server=" . $this->host . ";database=" . $this->db_name . ";", $this->username, $this->password);
			if ($this->dataConn === false) {
				$saida = false;
				die('não foi possivel acessar o banco de dados' . print_r(sqlsrv_errors(), true));
			} else {
				
			}

        } catch (Exception $erro1) {
            $saida = false;
            echo "Erro 1: " . $erro1->getMessage();
        }



        return $saida;
    }
}

?>