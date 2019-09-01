<?php
	class Pet{
		
		private $idPet;
		private $nome;
		private $dataDeNascimento;
		private $raca;
		private $pedrigree;
		private $adocao;
		private $pais;
		private $estado;
		private $cidade;
		private $imagem;
		private $idUsuario;
		
		public function setIdPet($idPet){
			$this->idPet = $idPet;
		}
		
		public function getIdPet(){
			return $this->idPet;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function setDataDeNascimento($dataDeNascimento){
			$this->dataDeNascimento = $dataDeNascimento;
		}
		
		public function getDataDeNascimento(){
			return $this->dataDeNascimento;
		}
		
		public function setRaca($raca){
			$this->$raca = $raca;
		}
		
		public function getRaca(){
			return $this->raca;
		}
		
		public function setPedigree($pedigree){
			$this->pedigree = $pedigree;
		}
		
		public function getPedigree(){
			return $this->pedigree;
		}
		
		public function setAdocao($adocao){
			$this->adocao = $adocao;
		}
		
		public function getAdocao(){
			return $this->adocao;
		}
				
		public function setPais($pais){
			$this->pais = $pais;
		}
		
		public function getPais(){
			return $this->pais;
		}
		
		public function setEstado($estado){
			$this->estado = $estado;
		}
		
		public function getEstado(){
			return $this->estado;
		}
		
		public function setCidade($cidade){
			$this->cidade = $cidade;
		}
		
		public function getCidade(){
			return $this->cidade;
		}
		
		public function setImagem($imagem){
			$this->imagem = $imagem;
		}
		
		public function getImagem(){
			return $this->imagem;
		}
		
		public function setIdUsuario($idUsuario){
			$this->idUsuario = $idUsuario;
		}
		
		public function getidUsuario(){
			return $this->idUsuario;
		}
		
		public function insert(){
			$conexao = new MySQL();
			$sql = "insert into pet (idPet, nome, dataDeNascimento, raca, pedigree, adocao, pais, estado, cidade, imagem, idUsuario) values ('$this->idPet', '$this->nome', '$this->dataDeNascimento', '$this->raca', '$this->telefone', '$this->pedigree', '$this->adocao', '$this->pais', '$this->estado','$this->cidade', '$this->imagem', '$this->idUsuario')";
			$conexao->executa($sql);
		}
		public function getAll(){
			$conexao = new MySQL();
			$sql = "select * from pet";
			$resultado = $conexao->consulta($sql);
			if($resultado){
				$pets = array();
				foreach($resultado as $p){
					$p1 = new Pet();
					$p1->setNome($p['nome']);
					$p1->setDataDeNascimento($p['dataNascimento']);
					$p1->setRaca($p['raca']);
					$p1->setPedigree($p['pedigree']);
					$p1->setAdocao($p['adocao']);
					$p1->setPais($p['pais']);
					$p1->setEstado($p['estado']);
					$p1->setCidade($p['cidade']);
					$p1->setImagem($p['imagem']);
					$pets[] = $p1;
				}
				return $pets;
			}else{
				return "nenhum";
			}
		}
		
		public function getByIdPet($idPet){
			$conexao = new MySQL();
			$sql = "select * from pet where idPet= '$idPet'";
			$resultado = $conexao->consulta($sql);
			$this->nome = $resultado[0]['nome'];
			$this->dataDeNascimento = $resultado[0]['dataNascimento'];
			$this->raca = $resultado[0]['raca'];
			$this->pedigree = $resultado[0]['pedigree'];
			$this->adocao = $resultado[0]['adocao'];
			$this->idPet = $resultado[0]['idPet'];
			$this->idUsuario = $resultado[0]['idUsuario'];
			$this->pais = $resultado[0]['pais'];
			$this->estado = $resultado[0]['estado'];
			$this->cidade = $resultado[0]['cidade'];
			$this->imagem = $resultado[0]['imagem'];
		}
		
		public function getByIdUsuarioNomePet($idUsuario,$nomePet){
			$conexao = new MySQL();
			$sql = "select * from pet where idUsuario = '$idUsuario' AND nome= '$nomePet'";
			$resultado = $conexao->consulta($sql);
			$this->nome = $resultado[0]['nome'];
			$this->dataDeNascimento = $resultado[0]['dataNascimento'];
			$this->raca = $resultado[0]['raca'];
			$this->pedigree = $resultado[0]['pedigree'];
			$this->adocao = $resultado[0]['adocao'];
			$this->idPet = $resultado[0]['idPet'];
			$this->idUsuario = $resultado[0]['idUsuario'];
			$this->pais = $resultado[0]['pais'];
			$this->estado = $resultado[0]['estado'];
			$this->cidade = $resultado[0]['cidade'];
			$this->imagem = $resultado[0]['imagem'];
		}
		
		public function getByIdUsuario($idUsuario){
			$conexao = new MySQL();
			$sql = "select * from pet where idUsuario= '$idUsuario'";
			$resultado = $conexao->consulta($sql);
			if($resultado){
				$pets = array();
				foreach($resultado as $p){
					$p1 = new Pet();
					$p1->setNome($p['nome']);
					$p1->setDataDeNascimento($p['dataNascimento']);
					$p1->setRaca($p['raca']);
					$p1->setPedigree($p['pedigree']);
					$p1->setAdocao($p['adocao']);
					$p1->setPais($p['pais']);
					$p1->setEstado($p['estado']);
					$p1->setCidade($p['cidade']);
					$p1->setImagem($p['imagem']);
					$p1->setIdPet($p['idPet']);
					$pets[] = $p1;
				}
			return $pets;
			}else{
				return "Nenhum";
			}
		}
		
		public function excluiPet($idPet){
			$conexao = new MySQL();
			$sql = "delete from pet where idPet = '$idPet'";
			$conexao->executa($sql);
		}
		
		public function editNome($nome,$idPet){
			$conexao = new MySQL();
			$sql = "update pet set nome = '$nome' where idPet = '$idPet'";
			$conexao->executa($sql);
		}
		
			public function editDataDeNascimento($dataNascimento,$idPet){
				$conexao = new MySQL();
				$sql = "update pet set dataNascimento = '$dataNascimento' where idPet = '$idPet'";
				$conexao->executa($sql);
		}
			public function editRaca($raca,$idPet){
				$conexao = new MySQL();
				$sql = "update pet set raca = '$raca' where idPet = '$idPet'";
				$conexao->executa($sql);
		}
			public function editPedigree($pedigree,$idPet){
				$conexao = new MySQL();
				$sql = "update pet set pedigree = '$pedigree' where idPet = '$idPet'";
				$conexao->executa($sql);
		}
			public function editAdocao($adocao,$idPet){
				$conexao = new MySQL();
				$sql = "update pet set adocao = '$adocao' where idPet = '$idPet'";
				$conexao->executa($sql);
		}
			public function editPais($pais,$idPet){
				$conexao = new MySQL();
				$sql = "update pet set pais = '$pais' where idPet = '$idPet'";
				$conexao->executa($sql);
		}
			public function editEstado($estado, $idPet){
				$conexao = new MySQL();
				$sql = "update pet set estado = '$estado' where idPet = '$idPet'";
				$conexao->executa($sql);
		}
			public function editCidade($cidade,$idPet){
				$conexao = new MySQL();
				$sql = "update pet set cidade = '$cidade' where idPet = '$idPet'";
				$conexao->executa($sql);
		}
	}
?>
