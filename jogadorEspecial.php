<?php

include_once('jogador.php');

class JogadorEspecial extends Jogador {

    private $vida = 2;	
	
    public function getVida(){
        return $this->vida;
    }
	
    public function setVida($vida){
        $this->vida = $vida;
    }

}

?>
