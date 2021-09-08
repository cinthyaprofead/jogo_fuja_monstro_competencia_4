<?php

class HistoricoJogo {

    private $data;
    private $inicioDuracao;
    private $finalDuracao;
    private $duracao;
	
    public function getData(){
        return $this->data;
    }
	
    public function setData($data){
        $this->data = $data;
    }

    public function getInicioDuracao(){
        return $this->inicioDuracao;
    }
	
    public function setInicioDuracao($inicioDuracao){
        $this->inicioDuracao = $inicioDuracao;
    }

    public function getFinalDuracao(){
        return $this->finalDuracao;
    }
	
    public function setFinalDuracao($finalDuracao){
        $this->finalDuracao = $finalDuracao;
    }

    public function getDuracao(){
        return $this->duracao;
    }
	
    public function setDuracao($duracao){
        $this->duracao = $duracao;
    }
	
}

?>






























