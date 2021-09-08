<?php

class Mapa {
	
    private $mapaEstadoAtual = null;
    private $numeroNivel;
	     
    private $mapaNivel_1 = [

        ["X","X","X","X","X","X","X","X","X","X","X","X","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","E","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","D"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","P","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","X","X","X","X","X","X","X","X","X","X","X","X"]
];

    private $mapaNivel_2 = [

        ["X","X","X","X","X","X","X","X","X","X","X","D","X"],
        ["X","E","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","P","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","X","X","X","X","X","X","X","X","X","X","X","X"]

];

    private $mapaNivel_3 = [

        ["X","X","X","X","X","X","X","X","X","X","X","X","X"],
        ["X","E","_","_","_","_","_","_","_","_","_","P","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","X"],
        ["D","_","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","X","X","X","X","X","X","X","X","X","X","X","X"]

];

    private $mapaNivel_4 = [

        ["X","X","X","X","X","X","X","X","X","X","X","X","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","E","X"],
        ["X","_","X","_","_","_","_","_","_","_","_","_","X"],
        ["X","_","_","_","_","_","_","_","_","X","_","_","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","D"],
        ["X","_","_","_","_","X","_","_","_","_","_","_","X"],
        ["X","P","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","X","X","X","X","X","X","X","X","X","X","X","X"]

];

    private $mapaNivel_5 = [

        ["X","X","X","X","X","X","X","X","X","X","X","X","X","X","X","X","X","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","P","X"],
        ["X","X","_","_","X","_","_","_","_","_","_","_","_","_","X","_","_","X"],
        ["X","_","_","_","_","_","_","_","X","_","_","_","_","_","_","_","_","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","_","X","_","_","_","X"],
        ["X","_","_","X","_","_","_","_","_","_","_","_","_","_","_","_","_","X"],
        ["D","E","_","_","_","_","_","_","_","_","_","_","_","_","_","_","X","X"],
        ["X","X","X","X","X","X","X","X","X","X","X","X","X","X","X","X","X","X"]

];

    private $mapaNivel_6 = [
        ["X","X","X","X","X","X","X","X","X","X","X","X","X","X","X","X","X","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","P","X"],
        ["X","_","_","X","_","_","_","_","_","_","_","_","_","X","_","_","_","X"],
        ["X","_","_","_","_","_","_","_","X","_","_","_","_","_","_","_","_","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","X","X","_","X","X","X","_","X","X","_","X","X","X","_","X","X","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","X"],
        ["X","_","_","_","X","_","_","_","_","_","_","_","_","_","X","_","_","X"],
        ["X","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","_","X"],
        ["D","E","_","_","_","_","_","_","X","_","_","_","_","_","_","_","_","X"],
        ["X","X","X","X","X","X","X","X","X","X","X","X","X","X","X","X","X","X"]
];


     public function __construct(){
	$this->numeroNivel = 1; 
	$this->mapaEstadoAtual = $this->mapaNivel_1;
    }

    public function getPrimeiroNivel(){
        return $this->mapaNivel_1 ;
    }


    public function getSegundoNivel(){
        return $this->mapaNivel_2 ;
    }

    public function getTerceiroNivel(){
        return $this->mapaNivel_3 ;
    }


    public function getQuartoNivel(){
        return $this->mapaNivel_4 ;
    }

    public function getQuintoNivel(){
        return $this->mapaNivel_5 ;
    }

    public function getSextoNivel(){
        return $this->mapaNivel_6 ;
    }

    public function getMapaEstadoAtual(){
        return $this->mapaEstadoAtual;
    }

    public function getNumeroNivel(){
        return $this->numeroNivel;
    }

    public function setNumeroNivel($numeroNivel){
        $this->numeroNivel = $numeroNivel;
    }
	
    public function setMapaEstadoAtual($mapaEstadoAtual){
        $this->mapaEstadoAtual = $mapaEstadoAtual;
    }
	
	
    public function obterCaracterePosicao($posicaoDesejada){
		return $this->mapaEstadoAtual[$posicaoDesejada[0]][$posicaoDesejada[1]];       
    }
	
    public function obterCoordenadaPosicaoDesejada($posicaoPersonagem, $comando){

                $posicaoDesejada = $posicaoPersonagem;
                
		if($comando == 'up'){
			$posicaoDesejada[0] = $posicaoPersonagem[0] - 1;

		} else if($comando == 'down'){
			$posicaoDesejada[0] = $posicaoPersonagem[0] + 1;

		} else if($comando == 'left'){
			$posicaoDesejada[1] = $posicaoPersonagem[1] - 1;

		} else if($comando == 'right'){
			$posicaoDesejada[1] = $posicaoPersonagem[1] + 1;

		}
			
        return  $posicaoDesejada;
    }
	
     public function obterCoordenadaMovimentoPersonagem($linhaPersonagem, $colunaPersonagem, $comando){
			
		if($comando == 'up'){
			$linhaPersonagem = $linhaPersonagem - 1;

		} else if($comando == 'down'){
			$linhaPersonagem = $linhaPersonagem + 1;

		} else if($comando == 'left'){
			$colunaPersonagem = $colunaPersonagem - 1;

		} else if($comando == 'right'){
			$colunaPersonagem = $colunaPersonagem + 1;

		}
				
        return  [$linhaPersonagem, $colunaPersonagem];
    }
	
    public function obterPosicaoPersonagem($caracterPersonagem){				
		$countLinha = 0;
		$countColuna = 0;		
		for($i = 0; $i < count($this->mapaEstadoAtual); ++$i) {						
			$linha = $this->mapaEstadoAtual[$i];
			for($j = 0; $j < count($linha); ++$j) {				
				$caractere = $this->mapaEstadoAtual[$i][$j];			
				if($caractere == $caracterPersonagem){
					return [$countLinha, $countColuna];
				}	
				$countColuna++;
			}
                        $countColuna = 0;
			$countLinha++;
		}		 
    }
	
	public function atualizaPersonagemMapa($personagem, $passouMapa){	
		
                $zerarJogo = false;                

		$linhaPersonagem = $personagem->getPosicao()[0];
		$colunaPersonagem = $personagem->getPosicao()[1];

		$linhaAnteriorPersonagem = $personagem->getPosicaoAnterior()[0];
		$colunaAnteriorPersonagem = $personagem->getPosicaoAnterior()[1];

		if(get_class($personagem) == "JogadorEspecial"){
			if($personagem->getEstado() == 1){
				if(!$passouMapa){
					if($personagem->getMovientou()){
                                               
						$this->mapaEstadoAtual[$linhaPersonagem][$colunaPersonagem] = "P";
						$this->mapaEstadoAtual[$linhaAnteriorPersonagem][$colunaAnteriorPersonagem] = "_";
					}
				}else{

					if ($this->numeroNivel == 1) {
						$this->mapaEstadoAtual = $this->mapaNivel_2;

					} else if ($this->numeroNivel == 2) {
						$this->mapaEstadoAtual = $this->mapaNivel_3;

					} else if ($this->numeroNivel == 3) {
						$this->mapaEstadoAtual = $this->mapaNivel_4;

					} else if ($this->numeroNivel == 4) {
						$this->mapaEstadoAtual = $this->mapaNivel_5;

					} else if ($this->numeroNivel == 5) {
						$this->mapaEstadoAtual = $this->mapaNivel_6;

					} else if ($this->numeroNivel == 6) {
                                                $zerarJogo = true;

					} 

                                        $personagem->setPosicao($this->obterPosicaoPersonagem("P"));
                                        $personagem->setPassouMapa(false);
                                        $personagem->setEstado(1);

				        $this->setNumeroNivel($this->getNumeroNivel() + 1);

				}
			} else {
				$this->mapaEstadoAtual[$linhaPersonagem][$colunaPersonagem] = "O";

			}

		} else if(get_class($personagem)=="PersonagemNaoJogavel"){
                        if($passouMapa){
				$this->mapaEstadoAtual[$linhaPersonagem][$colunaPersonagem] = "_";

			} else if(!$personagem->getMataPersonagem()){
				$this->mapaEstadoAtual[$linhaPersonagem][$colunaPersonagem] = "E";
				$this->mapaEstadoAtual[$linhaAnteriorPersonagem][$colunaAnteriorPersonagem] = "_";
			}			 
		}

                return $zerarJogo;
	}

    public function imprimirMapa($mapa){				
		$countLinha = 0;
		$countColuna = 0;		
		for($i = 0; $i < count($mapa); ++$i) {						
			$linha = $mapa[$i];
			for($j = 0; $j < count($linha); ++$j) {				
				echo $mapa[$countLinha][$countColuna];
				$countColuna++;
			}
                        $countColuna = 0;
			$countLinha++;
		}		 
    }

	
}


    






