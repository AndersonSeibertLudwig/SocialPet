<?php
    session_start();
    include_once "../Namoro.class.php";
    $namoro = new Namoro();
    $namoro->fazerNamoro($_SESSION['idPet'],$_GET['id']);
	header("location: homePet.php");
	exit();
?>