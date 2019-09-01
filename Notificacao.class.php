<?php
	require_once "./bd/MySQL.class.php";

	class Notificacao{
		
		private $tipo;
		private $idSolicitacao;
		private $idNotificacao;
		
		public function setTipo($tipo){
			$this->tipo = $tipo;
		}		
		public function getTipo(){
			return $this->tipo;
		}
		public function setIdSolicitacao($idSolicitacao){
			$this->idSolicitacao = $idSolicitacao;
		}		
		public function getIdSolicitacao(){
			return $this->idSolicitacao;
		}
		public function setIdNotificacao($idNotificacao){
			$this->idNotificacao = $idNotificacao;
		}		
		public function getIdNotificacao(){
			return $this->idNotificacao;
		}
	}
?>