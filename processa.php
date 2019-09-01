<?php
	session_start();
    include("./bd/MySQL.class.php");	
	if(isset($_POST)){
		if($_POST["botao"] == "Acessar"){
						
			$email = $_POST['login'];
			$senha = $_POST['senha'];
			
			$conexao = new MySQL();
			
			$sql = "select id,senha from usuario where email = '$email'";
						
			$dado = $conexao->consulta($sql);
					
			$senha_bd = $dado[0]['senha'];
			$id_bd = $dado[0]['id'];
			if(sha1($senha) == $senha_bd){				
				$_SESSION['id'] = $id_bd;
				$_SESSION['status'] = "logado";
				header("location: home.php");
			}else {
				echo "<script>alert('Credenciais inválidas!');"
				. "location.href='ops.html';</script>";
			}
		}
		if($_POST['botao'] == "Cadastrar"){
			$email = $_POST['email'];
			
			$conexao = new MySQL();
			
			$query_email = "select count(email) qtd_email from usuario where email = '$email'";
			
			if($conexao->consulta($query_email)[0]['qtd_email'] > 0){
				echo "<script>alert('E-mail já cadastrado!');"
				. "location.href='ops.html';</script>";
			}else {
				$nome=$_POST["nome"];
				$sobrenome=$_POST["sobrenome"];
				$email=$_POST["email"];
				$telefone=$_POST["telefone"];
				$senha=sha1($_POST["senha"]);
				$sql = "insert into usuario (nome,sobrenome,email,telefone,senha) values ('".$nome."','".$sobrenome."','".$email."','".$telefone."','".$senha."')";
				$conexao->executa($sql);
				$sql_id = "select id from usuario where email = '$email'";
				$consulta_id = $conexao->consulta($sql_id);
				$id = $consulta_id[0]['id'];
				$_SESSION['id'] = $id;
				$_SESSION['status'] = "logado";
				header("location:bemvindo.php");			
			}
		}
	}
?>
</html>