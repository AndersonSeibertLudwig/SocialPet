<?php
	require_once "./bd/MySQL.class.php";

	class Postagem{
		
		private $idPostagem;
		private $dataPostagem;
		private $conteudo;
		private $imagem;
		
		public function setIdPostagem($idPostagem){
			$this->idPostagem = $idPostagem;
		}		
		public function getIdPostagem(){
			return $this->idPostagem;
		}
		public function setDataPostagem($dataPostagem){
			$this->dataPostagem = $dataPostagem;
		}		
		public function getDataPostagem(){
			return $this->dataPostagem;
		}
		public function setConteudo($conteudo){
			$this->conteudo = $conteudo;
		}		
		public function getConteudo(){
			return $this->conteudo;
		}
		public function setImagem($imagem){
			$this->imagem = $imagem;
		}		
		public function getImagem(){
			return $this->imagem;
		}
	}
?>