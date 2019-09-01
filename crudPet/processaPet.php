<?php
	session_start();
    include_once("../bd/MySQL.class.php");
	$nome = $_POST["nome"];
	$idUsuario = $_SESSION["id"];
	$conexao = new MySQL();
	$sql_nome = "select nome from pet where nome='$nome' and idUsuario='$idUsuario'";
	if($conexao->consulta($sql_nome)[0]==TRUE){
		echo "<script>alert('Pet já cadastrado!');"
			. "location.href='../home.php';</script>";
	}
	else{
		
		$raca = $_POST['raca'];
		if($_POST['pedigree']=="Sim"){
			$pedigree = "sim";	
		}
		else if($_POST['pedigree']=="Não"){
			$pedigree = "não";
		}
		$dataNascimento = $_POST['dataNascimento'];
		$pais = $_POST['pais'];
		$estado = $_POST['estado'];
		$cidade = $_POST['cidade'];
		if($_POST['adocao']=="Sim"){
			$adocao = "sim";	
		}
		else if($_POST['adocao']=="Não"){
			$adocao = "não";
		}
		if($_FILES['imagem']!=""){
			$caminhoImg = "../ImgPerfil/".$_FILES["imagem"]['name']; //onde será gravado a imagem
			move_uploaded_file($_FILES["imagem"]['tmp_name'],$caminhoImg); //faz o upload da imagem
		}
		else if($_FILES['imagem']==""){
			$caminhoImg = "../ImgPerfil/padrao.png"; //onde será gravado a imagem
		}
		$sql = "insert into pet (nome,raca,pedigree,dataNascimento,pais,estado,cidade,adocao,idUsuario,imagem) values ('$nome','$raca','$pedigree','$dataNascimento','$pais','$estado','$cidade','$adocao','$idUsuario','$caminhoImg')";
		$conexao->executa($sql);
		echo "<script>alert('Pet cadastrado com sucesso!');"
				. "location.href='../home.php';</script>";
	}
?>