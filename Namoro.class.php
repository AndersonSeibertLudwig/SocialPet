<?php
	include_once "../bd/MySQL.class.php";

	class Namoro{
		
		private $idPet;
		private $idPet2;
		
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
		public function fazerNamoro($idPet,$idPet2){
            $conexao = new MySQL();
            $sql = "insert into namoro (idPet, idPet2, confirmacao) values ('$idPet','$idPet2','solicitado')";
            $resultado = $conexao->executa($sql);
		}
		public function aceita($idPet,$idPet2){
            $conexao = new MySQL();
            $sql = "update namoro set confirmacao = 'aceito' where idPet = '".$idPet2."' and idPet2 = '".$idPet."'";
            $conexao->executa($sql);
		}
		public function rejeita($idPet,$idPet2){
            $conexao = new MySQL();
            $sql = "update namoro set confirmacao = 'rejeitado' where idPet = '".$idPet2."' and idPet2 = '".$idPet."'";
            $conexao->executa($sql);
		}
		public function exibirNamoros($idPet){
            $conexao = new MySQL();
            $sql = "select * from namoro where idPet = '".$idPet."' and confirmacao = 'aceito' or idPet2 = '".$idPet."' and confirmacao = 'aceito'";
            $resultado = $conexao->consulta($sql);
            return $resultado;
		}
		public function desfazer($idPet,$idPet2){
            $conexao = new MySQL();
            $sql = "delete from namoro where idPet = '".$idPet2."' and idPet2 = '".$idPet."' or idPet = '".$idPet."' and idPet = '".$idPet2."'";
            $conexao->executa($sql);
		}
	}
?>