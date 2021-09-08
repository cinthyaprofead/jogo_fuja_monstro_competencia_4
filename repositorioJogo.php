<?php

include_once('conexao.php');
include_once('historicoJogo.php');
include_once('iRepositorioJogo.php');
	
class RepositorioHistoricoJogo implements IRepositorioHistoricoJogo {
		
		private $conexao;
                private $historicojogo;
		
		public function __construct(){

			$this->conexao = new Conexao("127.0.0.1", "root", "", "dadosfujamonstro");
                        $this->historicojogo = new HistoricoJogo();
			
			if ($this->conexao->conectar() == false) {
				echo "Erro".mysqli_error();
			}
		}
		
		public function cadastrarHistoricoJogo($historicoJogo){

			$data = $historicoJogo->getData()->format("d/m/y H:i:s");
			$inicioDuracao = $historicoJogo->getInicioDuracao()->format("H:i:s");
			$finalDuracao = $historicoJogo->getFinalDuracao()->format("H:i:s");
			$duracao = $historicoJogo->getDuracao();
			
			$sql = "INSERT INTO historicojogo (data, inicioDuracao, finalDuracao, duracao) VALUES
			('$data', 
                        '$inicioDuracao', 
                        '$finalDuracao', 
                        '$duracao')";
			
			$this->conexao->executarQuery($sql);
		}
		
		public function listarHistoricoJogo(){

			$listagem = $this->conexao->executarQuery("SELECT * FROM historicojogo");
			
			$arrayHistoricojogo = array();
			
			while($linha = mysqli_fetch_array($listagem)){
                                $this->historicojogo = new HistoricoJogo();				
				
                                $this->historicojogo->setData($linha['data']);
                                $this->historicojogo->setInicioDuracao($linha['inicioDuracao']);
			        $this->historicojogo->setFinalDuracao($linha['finalDuracao']);
			        $this->historicojogo->setDuracao($linha['duracao']);

			    array_push($arrayHistoricojogo, $this->historicojogo);
			}
			
			return $arrayHistoricojogo;
		}
	} 
	
?>





























