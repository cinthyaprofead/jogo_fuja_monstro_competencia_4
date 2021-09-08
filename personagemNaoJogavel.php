<?php

include_once('personagem.php');

class PersonagemNaoJogavel  extends Personagem {
    
    private $mataPersonagem;

    public function __construct(){
	$this->mataPersonagem = false;

    }
	
	public function getMataPersonagem(){
        return $this->mataPersonagem ;
    }

	public function setMataPersonagem($mataPersonagem){
        $this->mataPersonagem  = $mataPersonagem ;
    }
	
	public function mover($posicaoJogador, $mapaAtual){
		
		$direcaoMovimento = 0; // 0 = linha; 1 = coluna;
		
		$linhaPNJ = $this->getPosicao()[0];  // PNJ = Personagem_nao_jogavel
		$colunaPNJ = $this->getPosicao()[1];

		$linhaJogador = $posicaoJogador[0];
		$colunaJogador = $posicaoJogador[1];
		
		$distanciaLinha = $linhaPNJ - $linhaJogador;
		$distanciaColuna = $colunaPNJ - $colunaJogador;
		
		// define direção considerando obstáculos
				
		if ($distanciaLinha == 0 && $distanciaColuna!=0) {            // mesma linha, coluna diferente
			if ($colunaPNJ < $colunaJogador) {                                 // posição relativa antes do jogador
				if ($mapaAtual[$linhaPNJ][$colunaPNJ+1] == "_") {

					$direcaoMovimento = 1;
					$this->mataPersonagem = false;

				} else if ($mapaAtual[$linhaPNJ][$colunaPNJ+1] == "X") {

					$direcaoMovimento = 0;	
					$this->mataPersonagem = false;

				} else if ($mapaAtual[$linhaPNJ][$colunaPNJ+1] == "P") {

					$this->mataPersonagem = true;
				}				
			} else if ($colunaPNJ > $colunaJogador) {                       // posição relativa depois do jogador
				if ($mapaAtual[$linhaPNJ][$colunaPNJ-1] == "_") {

					$direcaoMovimento = 1;
					$this->mataPersonagem = false;					

				} else if ($mapaAtual[$linhaPNJ][$colunaPNJ-1] == "X") {

					$direcaoMovimento = 0;	
					$this->mataPersonagem = false;

				} else if ($mapaAtual[$linhaPNJ][$colunaPNJ-1] == "P") {

					$this->mataPersonagem = true;
				}				
			} 
		} else if ($distanciaLinha != 0 && $distanciaColuna==0){             // linha diferente, mesma coluna
			if ($linhaPNJ < $linhaJogador) {                                 // posição relativa antes do jogador
				if ($mapaAtual[$linhaPNJ+1][$colunaPNJ] == "_") {

					$direcaoMovimento = 0;	
					$this->mataPersonagem = false;

				} else if ($mapaAtual[$linhaPNJ+1][$colunaPNJ] == "X") {

					$direcaoMovimento = 1;	
					$this->mataPersonagem = false;

				} else if ($mapaAtual[$linhaPNJ+1][$colunaPNJ] == "P") {

					$this->mataPersonagem = true;
				}				
			} else if ($linhaPNJ > $linhaJogador) {                       // posição relativa depois do jogador
				if ($mapaAtual[$linhaPNJ-1][$colunaPNJ] == "_") {

					$direcaoMovimento = 0;	
					$this->mataPersonagem = false;

				} else if ($mapaAtual[$linhaPNJ-1][$colunaPNJ] == "X") {

					$direcaoMovimento = 1;	
					$this->mataPersonagem = false;

				} else if ($mapaAtual[$linhaPNJ-1][$colunaPNJ] == "P") {

					$this->mataPersonagem = true;
				}				
			} 
		} else if ($distanciaLinha != 0 && $distanciaColuna !=0) {        // linha diferente, coluna diferente
			$direcaoMovimento = rand(0,1);

		}
		
		// define movimento/posição desejada considerando direção

                $jogou = false;

		if (!$this->mataPersonagem) {
                while(!$jogou){
			if ($direcaoMovimento == 0) {     // se for mover linha
				if ($linhaPNJ < $linhaJogador) {

                                        if ($mapaAtual[$linhaPNJ+1][$colunaPNJ] == "_") {

                                                $this->setPosicaoAnterior($this->getPosicao());
					        $this->setPosicao([$linhaPNJ+1, $colunaPNJ]);	
                                                $jogou = true;
					        $this->mataPersonagem = false;

				        } else if ($mapaAtual[$linhaPNJ+1][$colunaPNJ] == "X") {

					        $direcaoMovimento = 1;	
					        $this->mataPersonagem = false;

				        } else if ($mapaAtual[$linhaPNJ+1][$colunaPNJ] == "P") {

                                                $jogou = true;
					        $this->mataPersonagem = true;
				        }	
			
				} else if ($linhaPNJ > $linhaJogador) {

                                        if ($mapaAtual[$linhaPNJ-1][$colunaPNJ] == "_") {

                                                $this->setPosicaoAnterior($this->getPosicao());
					        $this->setPosicao([$linhaPNJ-1, $colunaPNJ]);
                                                $jogou = true;	
					        $this->mataPersonagem = false;

				        } else if ($mapaAtual[$linhaPNJ-1][$colunaPNJ] == "X") {

					        $direcaoMovimento = 1;	
					        $this->mataPersonagem = false;

				        } else if ($mapaAtual[$linhaPNJ-1][$colunaPNJ] == "P") {

                                                $jogou = true;
					        $this->mataPersonagem = true;
				        }
					
				}
			}else if ($direcaoMovimento == 1) {
				if ($colunaPNJ < $colunaJogador) {

                                        if ($mapaAtual[$linhaPNJ][$colunaPNJ+1] == "_") {

                                                $this->setPosicaoAnterior($this->getPosicao());
					        $this->setPosicao([$linhaPNJ, $colunaPNJ+1]);	
                                                $jogou = true;
					        $this->mataPersonagem = false;

				        } else if ($mapaAtual[$linhaPNJ][$colunaPNJ+1] == "X") {

					        $direcaoMovimento = 0;	
					        $this->mataPersonagem = false;

				        } else if ($mapaAtual[$linhaPNJ][$colunaPNJ+1] == "P") {

                                                $jogou = true;
					        $this->mataPersonagem = true;
				        }	
			 
				} elseif ($colunaPNJ > $colunaJogador) {

                                        if ($mapaAtual[$linhaPNJ][$colunaPNJ-1] == "_") {

                                                $this->setPosicaoAnterior($this->getPosicao());
					        $this->setPosicao([$linhaPNJ, $colunaPNJ-1]);	
                                                $jogou = true;
					        $this->mataPersonagem = false;

				        } else if ($mapaAtual[$linhaPNJ][$colunaPNJ-1] == "X") {

					        $direcaoMovimento = 0;	
					        $this->mataPersonagem = false;

				        } else if ($mapaAtual[$linhaPNJ][$colunaPNJ-1] == "P") {

                                                $jogou = true;
					        $this->mataPersonagem = true;
				        }
	
				}
			}
		}
            } 
		
		return $this->posicao;		
	}

}

?>
