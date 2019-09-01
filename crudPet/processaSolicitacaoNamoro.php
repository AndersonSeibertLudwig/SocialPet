<?php
    session_start();
    include_once "../Namoro.class.php";
    if($_POST['botao']=='Aceitar'){
        $namoro = new Namoro();
        $namoro->aceita($_SESSION['idPet'],$_GET['id']);
    }
     if($_POST['botao']=='Rejeitar'){
        $namoro = new Namoro();
        $namoro->rejeita($_SESSION['idPet'],$_GET['id']);
    }
	if($_POST['botao']=='Desfazer namoro'){
        $namoro = new Namoro();
        $namoro->desfazer($_SESSION['idPet'],$_GET['id']);
    }
    header ("location: solicitacao.php");
?>