<?php
	include_once "../bd/MySQL.class.php";

	class Amizade{
		
		private $idPet;
		private $idPet2;
		private $confirmacao;
		
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
		public function setConfirmacao($confirmacao){
			$this->confirmacao = $confirmacao;
		}		
		public function getConfirmacao(){
			return $this->confirmacao;
		}
		public function fazerAmizade($idPet,$idPet2){
            $conexao = new MySQL();
            $sql = "insert into amizade (idPet, idPet2, confirmacao) values ('$idPet','$idPet2','solicitado')";
            $resultado = $conexao->executa($sql);
		}
		public function aceita($idPet,$idPet2){
            $conexao = new MySQL();
            $sql = "update amizade set confirmacao = 'aceito' where idPet = '".$idPet2."' and idPet2 = '".$idPet."'";
            $conexao->executa($sql);
		}
		public function rejeita($idPet,$idPet2){
            $conexao = new MySQL();
             $sql = "update amizade set confirmacao = 'rejeitado' where idPet = '".$idPet2."' and idPet2 = '".$idPet."'";
            $conexao->executa($sql);
		}
		public function exibirAmizades($idPet){
            $conexao = new MySQL();
            $sql = "select * from amizade where idPet = '".$idPet."' and confirmacao = 'aceito' or idPet2 = '".$idPet."' and confirmacao = 'aceito'";
            $resultado = $conexao->consulta($sql);
            return $resultado;
		}
		public function desfazer($idPet,$idPet2){
            $conexao = new MySQL();
            $sql = "delete from amizade where idPet = '".$idPet2."' and idPet2 = '".$idPet."' or idPet = '".$idPet."' and idPet = '".$idPet2."'";
            $conexao->executa($sql);
		}
	}
?>