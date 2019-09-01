<?php
	require_once "./bd/MySQL.class.php";

	class Usuario{
		
		private $id;
		private $nome;
		private $sobrenome;
		private $email;
		private $telefone;
		private $senha;
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function setNome($nome){
			$this->nome = $nome;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function setSobrenome($sobrenome){
			$this->sobrenome = $sobrenome;
		}
		
		public function getSobrenome(){
			return $this->sobrenome;
		}
		
		public function setEmail($email){
			$this->$email = $email;
		}
		
		public function getEmail(){
			return $this->email;
		}
		
		public function setTelefone($telefone){
			$this->telefone = $telefone;
		}
		
		public function getTelefone(){
			return $this->telefone;
		}
		
		public function setSenha($senha){
			$this->senha = $senha;
		}
		
		public function getSenha(){
			return $this->senha;
		}
		
		public function insert(){
			$conexao = new MySQL();
			$sql = "insert into usuario (nome, sobrenome, email, telefone, senha) values ('$this->nome', '$this->numero', '$this->email', '$this->telefone', '$this->senha')";
			$conexao->executa($sql);
		}
		public function getAll(){
			$conexao = new MySQL();
			$sql = "select * from usuario";
			$resultado = $conexao->consulta($sql);
			if($resultado){
				$usuarios = array();
				foreach($resultado as $u){
					$u1 = new Usuario();
					$u1->setNome($u['nome']);
					$u1->setSobrenome($u['sobrenome']);
					$u1->setEmail($u['email']);
					$u1->setTelefone($u['telefone']);
					$u1->setSenha($u['senha']);
					$usuarios[] = $u1;
				}
				return $usuarios;
			}else{
				return "nenhum";
			}
		}
		
		public function getById($id){
			$conexao = new MySQL();
			$sql = "select * from usuario where id= '$id'";
			$resultado = $conexao->consulta($sql);
			$this->nome = $resultado[0]['nome'];
			$this->sobrenome = $resultado[0]['sobrenome'];
			$this->email = $resultado[0]['email'];
			$this->telefone = $resultado[0]['telefone'];
			$this->senha = $resultado[0]['senha'];
			$this->id = $resultado[0]['id'];
		}
		
		public function delete($id){
			$conexao = new MySQL();
			$sql = "delete from usuario where id = '$id'";
			$conexao->executa($sql);
		}
		
		public function editNome($nome,$id){
                        $conexao = new MySQL();
                        $sql = "update usuario set nome = '$nome' where id = '$id'";
                        $conexao->executa($sql);
		}
		
		public function editSobrenome($sobrenome,$id){
			$conexao = new MySQL();
			$sql = "update usuario set sobrenome = '$sobrenome' where id = '$id'";
			$conexao->executa($sql);
		}
		
		public function editEmail($email,$id){
			$conexao = new MySQL();
			$sql = "update usuario set email = '$email' where id = '$id'";
			$conexao->executa($sql);
		}
		
		public function editTelefone($telefone,$id){
			$conexao = new MySQL();
			$sql = "update usuario set telefone = '$telefone' where id = '$id'";
			$conexao->executa($sql);
		}
		
		public function editSenha($senha,$email){
			$conexao = new MySQL();
			$sql = "update usuario set senha = '$senha' where id = '$id'";
			$conexao->executa($sql);
		}
	}
?>