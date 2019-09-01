<?php
    session_start();
    include_once "../Amizade.class.php";
    $amizade = new Amizade();
    $amizade->fazerAmizade($_SESSION['idPet'],$_GET['id']);
	header("location: homePet.php");
	exit();
?>