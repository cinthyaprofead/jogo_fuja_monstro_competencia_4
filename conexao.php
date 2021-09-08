<?php
 
class Conexao{
  	
  	private $host;
	private $usuario;
	private $senha;
	private $banco;
	private $conexao;
	
	public function __construct($host, $usuario, $senha,$banco){
		
		$this->host = $host;
		$this->usuario = $usuario;
		$this->senha = $senha;
		$this->banco = $banco;
		
	}
	
	public function conectar(){

		$this->conexao = mysqli_connect(
			$this->host,
			$this->usuario,
			$this->senha,
			$this->banco);
		
		if (mysqli_connect_errno($this->conexao)) {
			return false;

		} else {
			mysqli_query($this->conexao, "SET NAMES 'utf8';");
			return true;
		}
	}
  	
	public function executarQuery($sql){

		return mysqli_query($this->conexao, $sql);
	}
	

  }
?>




















