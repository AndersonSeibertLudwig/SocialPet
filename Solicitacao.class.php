<?php
	require_once "./bd/MySQL.class.php";

	class Solicitacao{
		
		private $tipo;
		private $idPet;
		private $idPet2;
		private $idSolicitacao;
		
		public function setTipo($tipo){
			$this->tipo = $tipo;
		}		
		public function getTipo(){
			return $this->tipo;
		}
		public function setIdPet($idPet){
			$this->idPet = $idPet;
		}		
		public function getIdPet(){
			return $this->idPet;
		}
		public function setIdPet2($idPet2){
			$this->idPet2 = $idPet2;
		}		
		public function getIdPet2(){
			return $this->idPet2;
		}
		public function setIdSolicitacao($idSolicitacao){
			$this->idSolicitacao = $idSolicitacao;
		}		
		public function getIdSolicitacao(){
			return $this->idSolicitacao;
		}
	}
?>