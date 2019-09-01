<?php
	session_start();
?>
<html>
	<head>
	<title> Social Pets </title>
	<meta charset="UTF-8"> 
	</title>
	<link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
	</head>
	<body>
	<div id="logoalteracad">
        <img src="../Imagens/logo.png" height="100%" width="50%">
    </div>
	<a href="homePet.php"> Voltar </a> <br> <br>
<?php
    include_once "../Namoro.class.php";
    include_once "../bd/MySQL.class.php";
    $namoro = new Namoro();
    $namorados = $namoro->exibirNamoros($_SESSION['idPet']);
    $conexao = new MySQL();
    if($namorados){
        foreach($namorados as $n){
			if($_SESSION['idPet']==$n['idPet']){
            $sql = "select * from pet where idPet = '".$n['idPet2']."'";
			$resultado = $conexao->consulta($sql);
			$imagem = $resultado[0]['imagem'];
			echo "<img src='../ImgPerfil/".$imagem."' height=175px width=175px />";
			echo $resultado[0]['nome'];
			echo "<form action='processaSolicitacaoNamoro.php?id=".$resultado[0]["idPet"]."' method='post'>";
            echo "<input type='submit' value='Desfazer namoro' name='botao'>";
            echo "</form>";
			echo "<br><br>";
			}
			else if($_SESSION['idPet']==$n['idPet2']){
            $sql = "select * from pet where idPet = '".$n['idPet']."'";
			$resultado = $conexao->consulta($sql);
			$imagem = $resultado[0]['imagem'];
			echo "<img src='../ImgPerfil/".$imagem."' height=175px width=175px />";
			echo $resultado[0]['nome'];
			echo "<form action='processaSolicitacaoNamoro.php?id=".$resultado[0]["idPet"]."' method='post'>";
            echo "<input type='submit' value='Desfazer namoro' name='botao'>";
            echo "</form>";
			echo "<br><br>";
			}
        }
	}
    else{
        echo "Esse pet não possui namorados";
    }
	echo "</body>";
	echo "</html>";
?>