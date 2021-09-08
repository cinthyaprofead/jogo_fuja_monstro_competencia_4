<?php

abstract class Personagem {
    	
	protected $posicao = array();
	protected $posicaoAnterior = array();
	
	public function getPosicao(){
        return $this->posicao;
    }

	public function setPosicao($posicao){
        $this->posicao = $posicao;
    }
	
	public function getPosicaoAnterior(){
        return $this->posicaoAnterior;
    }

	 public function setPosicaoAnterior($posicaoAnterior){
        $this->posicaoAnterior = $posicaoAnterior;
    }

	public abstract function mover($parametro1, $parametro2);
	
	
}

?>
