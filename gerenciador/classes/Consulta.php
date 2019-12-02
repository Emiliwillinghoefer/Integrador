<?php
include_once "BD.php";
class Consulta{
    private $conexao;


    function __construct(){
      $this->conexao = new BD();
    }

    function consultaUser($login,$senha){
      $sql = "SELECT * FROM usuario WHERE login='$login' AND senha='$senha'";
      $result = $this->conexao->select($sql);
      return $result;
    }
    function consultaCliente(){
        $sql = "SELECT * FROM clientefisico f UNION SELECT * FROM clientejuridico j";
        $result = $this->conexao->select($sql);
        return $result;
    }


    function consultaServico(){
      $sql = "SELECT nameser, id FROM servico";
      $result = $this->conexao->select($sql);
      return $result;
    }
    function cadProdutos(){
      $descricao =  $_POST['namep'];
      $categoria = $_POST['cat'];
      $quantidade = $_POST['quant'];
      $valorcusto = $_POST['valuepg'];
      $valorvenda = $_POST['valuevd'];
      $data = $_POST['dtcomp'];
      $fornecedor = $_POST['fornecedor'];

      $sql = "INSERT INTO produto(namep,cat,quant,valuepg,valuevd, dtcomp, fornecedor)VALUES('$descricao','$categoria',$quantidade, $valorcusto,$valorvenda,DATE('$data'),'$fornecedor')";
      $result= $this->conexao->query($sql);
      return $result;
    }
    function exibeProd(){
      $sql = "SELECT * FROM produto";
      $result = $this->conexao->select($sql);
      return $result;
    }
    function consJardimProd($a, $b,$c){
      $sql = "INSERT INTO jardimproduto (	idservico,cod,quant) VALUES($a,$b,$c)";

      $result = $this->conexao->query($sql);
      return $result;
    }
    function consultaID($nomeJ){
          $sql = "SELECT id FROM servico WHERE nameser = '$nomeJ'";
          $result = $this->conexao->select($sql);
          return $result;
    }
    function consultaCod($name){
         $sql = "SELECT cod FROM produto WHERE namep = '$name'";
         // var_dump($sql);
         $result = $this->conexao->select($sql);
         return $result;
    }
    function insereServico($nomejar,$tipo){
      $data = date("Y-m-d");
      $sql = "INSERT INTO servico (nameser, dthr, nser) VALUES ('$nomejar', DATE('$data'), '$tipo')";
      $result = $this->conexao->query($sql);
      return $result;
    }

    function QueryManutencao(){
      $sql = "SELECT * FROM tipomanutencao";
      $result = $this->conexao->select($sql);
      return $result;
    }
    function insereManutencao($a,$b){
        $sql="INSERT INTO servmanutencao (idtipo, id)VALUES ($a,$b)";
        $result = $this->conexao->query($sql);
        return $result;
    }

    function insereAgenda(){

      $cli = $_POST['cliente'];
      $idserv = $_POST['idser'];
      $end = $_POST['end'];
      $data = $_POST['data'];
      $sql = "INSERT INTO agendamento(ncliente,idServ,endereco,dataagend) VALUES ('$cli', $idserv,'$end',DATE('$data'))";
      $result = $this->conexao->query($sql);
      return $result;
    }
    function agenda($data){
      $sql = "SELECT *, s.nameser FROM agendamento a JOIN servico s ON a.idServ = s.id WHERE '$data' = dataagend";
      $result = $this->conexao->select($sql);
      return $result;

    }
    function insertFisico(){
      $nome = $_POST['nome'];
      $CPF = $_POST['cpf'];
      $end = $_POST['endereco'];
      $telef = $_POST['telefone'];
      $bairro = $_POST['bairro'];
      $numero = $_POST['numero'];
      $comp = $_POST['complemento'];

      $sql= "INSERT INTO clientefisico(nome,cpf,endereco,telefone,bairro,numero,complemento)VALUES('$nome','$CPF','$end', $telef,'$bairro',$numero,'$comp')";

      $result = $this->conexao->query($sql);
      return $result;

    }
    function insertJuridico(){
      $nome = $_POST['nome'];
      $CNPJ = $_POST['cnpj'];
      $end = $_POST['endereco'];
      $telef = $_POST['telefone'];
      $bairro = $_POST['bairro'];
      $numero = $_POST['numero'];
      $comp = $_POST['complemento'];

      $sql= "INSERT INTO clientejuridico(nome,cnpj,endereco,telefone,bairro,numero,complemento)VALUES('$nome','$CNPJ','$end', $telef,'$bairro',$numero,'$comp')";
      $result = $this->conexao->query($sql);
      return $result;
    }

}

 ?>
