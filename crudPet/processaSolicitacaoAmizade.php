<?php
    session_start();
    include_once "../Amizade.class.php";
    if($_POST['botao']=='Aceitar'){
        $amizade = new Amizade();
        $amizade->aceita($_SESSION['idPet'],$_GET['id']);
    }
    if($_POST['botao']=='Rejeitar'){
        $amizade = new Amizade();
        $amizade->rejeita($_SESSION['idPet'],$_GET['id']);
    }
	if($_POST['botao']=='Desfazer amizade'){
        $amizade = new Amizade();
        $amizade->desfazer($_SESSION['idPet'],$_GET['id']);
    }
    header ("location: solicitacao.php");
?>