<?php
	session_start();
        if(!isset($_SESSION["status"])){
            echo "<script>alert('Você precisa estar logado para visualizar esta página!');"
                . "location.href='ops.html';</script>";
	}
	include_once "../bd/MySQL.class.php";
	include_once "Pet.class.php";
	
	
	if(isset($_POST)){
		if($_POST["botao"]=="Editar"){
			if($_POST["nome"]!=""){
				$p = new Pet();
				$p->editNome($_POST["nome"],$_SESSION["idPet"]);
				$_SESSION["pet"] = $_POST["nome"];
			}
			
			if($_POST["dataNascimento"]!=""){
				$p = new Pet();
				$p->editDataDeNascimento($_POST["dataNascimento"],$_SESSION["idPet"]);
			}
			
			if($_POST["raca"]!=""){
				$p = new Pet();
				$p->editRaca($_POST["raca"],$_SESSION["idPet"]);
			}
			
			if($_POST["pedigree"]!=""){
				$p = new Pet();
				$p->editPedigree($_POST["pedigree"],$_SESSION["idPet"]);
			}
			
			if($_POST["adocao"]!=""){
				$p = new Pet();
				$p->editAdocao($_POST["adocao"],$_SESSION["idPet"]);
			}
			if($_POST["pais"]!=""){
				$p = new Pet();
				$p->editPais($_POST["pais"],$_SESSION["idPet"]);
			}
			if($_POST["estado"]!=""){
				$p = new Pet();
				$p->editEstado($_POST["estado"],$_SESSION["idPet"]);
			}
			if($_POST["cidade"]!=""){
				$p = new Pet();
				$p->editCidade($_POST["cidade"],$_SESSION["idPet"]);
			}
			if($_FILES['imagem']!=""){
				$caminhoImg = "../ImgPerfil/".$_FILES["imagem"]['name']; //onde será gravado a imagem
				move_uploaded_file($_FILES["imagem"]['tmp_name'],$caminhoImg); //faz o upload da imagem
				$conexao = new MySQL();
				$idPet = $_SESSION["idPet"];
				$sql = "update pet set imagem = '$caminhoImg' where idPet = '$idPet'";
				$conexao->executa($sql);
			}
			echo "<script>alert('Dados alterados com sucesso!');"
                . "location.href='homePet.php';</script>";
		}
		
		if($_POST["botao"]=="Excluir Pet"){
            $p = new Pet();
			$p->excluiPet($_SESSION["idPet"]);
			echo "<script>alert('Conta excluida com sucesso!');"
                . "location.href='../home.php';</script>";
        }				
	}
?>
