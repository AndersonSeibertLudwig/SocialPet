<?php
	require_once "./bd/MySQL.class.php";

	class Comentario{
		
		private $idPostagem;
		private $conteudo;
		
		public function setIdPostagem($idPostagem){
			$this->idPostagem = $idPostagem;
		}		
		public function getIdPostagem(){
			return $this->idPostagem;
		}
		public function setConteudo($conteudo){
			$this->conteudo = $conteudo;
		}		
		public function getConteudo(){
			return $this->conteudo;
		}
	}
?>