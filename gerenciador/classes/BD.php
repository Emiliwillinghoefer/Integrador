<?php
class BD {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "gerenciador";
    private $conexao;

    function __construct() {
        $this->conexao = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        mysqli_query($this->conexao, "SET NAMES 'utf8'");
    }

    function select($sql) {
        $retorno = mysqli_query($this->conexao, $sql); // $this->conexao->query($sql);
        $arrayResultados = array();
        if (mysqli_num_rows($retorno) > 0) {
            while($linha = mysqli_fetch_assoc($retorno)) {
                $arrayResultados[] = $linha;
            }
        }
        return $arrayResultados;
    }

    function query($sql) { // outras queries
        return mysqli_query($this->conexao, $sql);
    }

    function erro(){
        return mysqli_error($this->conexao);
    }
    function Consulta(){
      $sql = "SELECT * FROM cliente";
      $result = $this->select($sql);

    	return $result;
      }
}
?>
