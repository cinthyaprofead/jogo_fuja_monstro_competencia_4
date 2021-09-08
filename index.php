<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('personagem.php');
include_once('jogador.php');
include_once('jogadorEspecial.php');
include_once('jogo.php');
include_once('historicoJogo.php');

$mapa = null;
$personagemJogador = null;
$personagemNaoJogavel = null;
$posicaoDesejada = null;
$historicoJogo = null;

if(isset($_POST) && isset($_POST['dir'])){
	
        $personagemJogadorSerializado = file_get_contents('personagemJogadorSerializado');
        $personagemJogador = unserialize($personagemJogadorSerializado);  

        $mapaSerializado = file_get_contents('mapaSerializado');
        $mapa = unserialize($mapaSerializado); 

        $personagemNaoJogavelSerializado = file_get_contents('personagemNaoJogavelSerializado');
        $personagemNaoJogavel = unserialize($personagemNaoJogavelSerializado); 

        $historicoJogoSerializado = file_get_contents('historicoJogoSerializado');
        $historicoJogo = unserialize($historicoJogoSerializado); 

        $posicaoDesejada = $mapa->obterCoordenadaPosicaoDesejada($personagemJogador->getPosicao(), $_POST['dir']);
	
}

$jogo = new Jogo($mapa, $personagemJogador, $personagemNaoJogavel, $historicoJogo);

if(!is_null($posicaoDesejada)) {
    
    $jogo->executarJogo($posicaoDesejada);
}

$jogo->renderizarMapa();

?>










































