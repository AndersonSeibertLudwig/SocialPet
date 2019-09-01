<?php
	include_once "./bd/MySQL.class.php";
	include_once "Usuario.class.php";
	
	session_start();
        if(!isset($_SESSION["status"])){
            echo "<script>alert('Você precisa estar logado para visualizar esta página!');"
                . "location.href='ops.html';</script>";
	}
	
	if(isset($_POST)){
		if($_POST["botao"]=="Editar"){
			if($_POST["nome"]!=""){
				$u = new Usuario();
				$u->editNome($_POST["nome"],$_SESSION["id"]);
			}
			
			if($_POST["sobrenome"]!=""){
				$u = new Usuario();
				$u->editSobrenome($_POST["sobrenome"],$_SESSION["id"]);
			}
			
			if($_POST["email"]!=""){
				$u = new Usuario();
				$u->editEmail($_POST["email"],$_SESSION["id"]);
			}
			
			if($_POST["telefone"]!=""){
				$u = new Usuario();
				$u->editTelefone($_POST["telefone"],$_SESSION["id"]);
			}
			
			if($_POST["senha"]!=""){
				$u = new Usuario();
				$u->editSenha($_POST["senha"],$_SESSION["id"]);
			}
			echo "<script>alert('Seus dados foram alterados com sucesso!');"
                . "location.href='home.php';</script>";
		}
		
		if($_POST["botao"]=="Excluir Conta"){
            $u = new Usuario();
            $u->delete($_SESSION["id"]);
			echo "<script>alert('Sua conta foi excluida com sucesso!');"
                . "location.href='sair.php';</script>";
        }
		if($_POST["botao"]=="Voltar"){
                   header("location: home.php");
                }
				
	}
?>