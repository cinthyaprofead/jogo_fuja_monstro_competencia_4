<?php

include_once('mapa.php');
include_once('jogador.php');
include_once('jogadorEspecial.php');
include_once('personagemNaoJogavel.php');
include_once('historicoJogo.php');
include_once('repositorioJogo.php');

class Jogo {

	private $mapa;
	private $personagemJogador;
	private $personagemNaoJogavel;
        private $historicoJogo;
        private $repositorio;
        private $html_saida;
	
public function __construct($mapa, $personagemJogador, $personagemNaoJogavel, $historicoJogo){       

	
        if(is_null($mapa)){ 
		
			$this->mapa = new Mapa();			
			$this->personagemJogador = new JogadorEspecial();
                        $this->personagemNaoJogavel = new PersonagemNaoJogavel();
                        $this->historicoJogo = new HistoricoJogo();
        } else {

                        $this->mapa = $mapa;			
			$this->personagemJogador = $personagemJogador;		
			$this->personagemNaoJogavel = $personagemNaoJogavel;
			$this->historicoJogo = $historicoJogo;
			
        }
		$this->personagemJogador->setPosicao($this->mapa->obterPosicaoPersonagem("P"));
		$this->personagemNaoJogavel->setPosicao($this->mapa->obterPosicaoPersonagem("E"));
    }
	
public function executarJogo($posicaoDesejada){

	$this->personagemJogador->mover($this->mapa->obterCaracterePosicao($posicaoDesejada), $posicaoDesejada);

        if(is_null($this->historicoJogo->getData())){

                $this->historicoJogo->setData(new DateTime(date('Y-m-d H:i:s')));
                $this->historicoJogo->setInicioDuracao(new DateTime(date('H:i:s')));

        }

        $passouMapa = $this->personagemJogador->getPassouMapa();

        $zerarJogo = $this->mapa->atualizaPersonagemMapa($this->personagemJogador, $passouMapa);

        if($zerarJogo){
       
                $this->historicoJogo->setFinalDuracao(new DateTime(date('H:i:s')));

                $duraco = $this->historicoJogo->getInicioDuracao()->diff($this->historicoJogo->getFinalDuracao());
                $this->historicoJogo->setDuracao($duraco->format("%H:%I:%S"));

                $this->repositorio = new RepositorioHistoricoJogo();
                $this->repositorio->cadastrarHistoricoJogo($this->historicoJogo);

                $this->mapa = new Mapa();			
		$this->personagemJogador = new JogadorEspecial();
                $this->personagemNaoJogavel = new PersonagemNaoJogavel();
                $this->historicoJogo = new HistoricoJogo();

                $this->personagemJogador->setPosicao($this->mapa->obterPosicaoPersonagem("P"));
		$this->personagemNaoJogavel->setPosicao($this->mapa->obterPosicaoPersonagem("E"));

        }else if(!$passouMapa){
                $this->personagemNaoJogavel->mover($this->personagemJogador->getPosicao(), $this->mapa->getMapaEstadoAtual());
	        $this->mapa->atualizaPersonagemMapa($this->personagemNaoJogavel, $passouMapa);

                $vida = $this->personagemJogador->getVida();

                if($this->personagemNaoJogavel->getMataPersonagem()){

                        if ($vida > 1){

                                $this->personagemJogador->setVida($vida - 1);
                                $this->personagemNaoJogavel->setMataPersonagem(false);

                        } else {
                                $this->personagemJogador->setEstado(0);
                                $this->mapa->atualizaPersonagemMapa($this->personagemJogador, $passouMapa);

                        }
                }
        }
		
    }		
	
	
private function gerarMapa(){
        $saida = '';
        foreach ($this->mapa->getMapaEstadoAtual() as $linha) {
            foreach ($linha as $coluna) {
                if ($coluna == 'X') {
                    $saida .= '<input type=image src="imagens/rocha.png" width="55" height="55">';
                } else if ($coluna == 'P') {
                    $saida .= '<input type=image src="imagens/princesa.png" width="55" height="55">'; 
                } else if ($coluna == 'E') {
                    $saida .= '<input type=image src="imagens/monstro.png" width="55" height="55">';
                } else if ($coluna == 'D') {
                    $saida .= '<input type=image src="imagens/portal.png" width="55" height="55">';                    
                } else if ($coluna == 'O') {
                    $saida .= '<input type=image src="imagens/fantasma.png" width="55" height="55">';
                } else {
                    $saida .= '<input type=image src="imagens/grama.png" width="55" height="55">';   
                }
            }
            $saida .= '<br>';
        }

        return $saida;
    }
	

private function gerarHistoricoJogo(){

        $this->repositorio = new RepositorioHistoricoJogo();
        $historicosJogos = $this->repositorio->listarHistoricoJogo();
 
        $retorno = '<table align=center border=1 >
                 <tr> 
                        <td align=center><b> Data do Jogo </b></td>
                        <td align=center><b> Duracao </b></td>
                        <td align=center><b> Número de vidas </b></td>
                 </tr>'; 
        
                while($historicoJogoBanco = array_shift($historicosJogos)){
                        
                 $retorno .= '<tr>
                                <td align=center>'.$historicoJogoBanco->getData().' </td>
                                <td align=center>'.$historicoJogoBanco->getDuracao().' </td>
                        </tr>';
                        }
                $retorno .= '</table> ';

        return $retorno;


 }

private function gerarFormulario(){

        $personagemJogadorSerializado = serialize($this->personagemJogador);
        file_put_contents('personagemJogadorSerializado', $personagemJogadorSerializado);

        $mapaSerializado = serialize($this->mapa);
        file_put_contents('mapaSerializado', $mapaSerializado);

        $personagemNaoJogavelSerializado = serialize($this->personagemNaoJogavel);
        file_put_contents('personagemNaoJogavelSerializado', $personagemNaoJogavelSerializado);

        $historicoJogoSerializado = serialize($this->historicoJogo);
        file_put_contents('historicoJogoSerializado', $historicoJogoSerializado);

        $retorno = '<form method="POST" align=center>
        <button name="dir"  class="botao_esquedo" value="left">Esquerda</button>
        <button name="dir" class="botao_direito" value="right">Direita</button>
        <button name="dir" class="botao_cima" value="up">Cima</button>
        <button name="dir" class="botao_baixo" value="down">Baixo</button>		
			
        </form>

        <p>Você está no nível '.$this->mapa->getNumeroNivel().'</p>
        <p>Você possui '.$this->personagemJogador->getVida().' vida(s) </p>';

        return $retorno;

       
    }
	
public function renderizarMapa(){


        $this->html_saida ='<html> <body> <div class="container">';
        $this->html_saida .= '<h1 align=center> Fuja do Monstro </h1>';

        $this->html_saida .= ' <div class="col-6" style="float:left">';
        $this->html_saida .= $this->gerarMapa();
        
        if($this->personagemJogador->getEstado()==1){ // se o jogador está vivo
            $this->html_saida.= $this->gerarFormulario();
        }

        $this->html_saida .= '</div>';
        $this->html_saida .= '<div class="col-6">';

                        $this->html_saida .= $this->gerarHistoricoJogo();
                        $this->html_saida .= '<br><br>';

               
        $this->html_saida .= '</div> ';
        $this->html_saida .= file_get_contents('rodape.html');

        echo $this->html_saida;

    }
	
}

?>
