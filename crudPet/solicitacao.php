<?php
    session_start();
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Social Pets </title>
		<link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
	</head>
	<body>
	<div id="logoalteracad">
            <img src="../Imagens/logo.png" height="100%" width="50%">
    </div>
	<?php
    include_once "../bd/MySQL.class.php";
    echo '<a href="homePet.php"> Voltar </a> <br><br>';
    $sql_amizade = "(SELECT * FROM amizade WHERE idPet2 ='".$_SESSION['idPet']."'  AND confirmacao = 'solicitado')";
    $sql_namoro = "(SELECT * FROM namoro WHERE idPet2 ='".$_SESSION['idPet']."'  AND confirmacao = 'solicitado')";
    $conexao = new MySQL();
    $resultado_amizade = $conexao->consulta($sql_amizade);
    $resultado_namoro = $conexao->consulta($sql_namoro);
    if($resultado_amizade){
        echo "Notificações de amizade: <br>";
        foreach ($resultado_amizade as $ra){
            $sql_pet = "select * from pet where idPet = '".$ra['idPet']."'";
                $resultado_pet = $conexao->consulta($sql_pet);
                if($resultado_pet){
					$imagem = $resultado_pet[0]['imagem'];
					echo "<img src='../ImgPerfil/".$imagem."' height=175px width=175px />";
                    echo $resultado_pet[0]["nome"]."<br>";
                    echo "<form action='processaSolicitacaoAmizade.php?id=".$resultado_pet[0]["idPet"]."' method='post'>";
                    echo "<input type='submit' value='Aceitar' name='botao'>";
                    echo "<input type='submit' value='Rejeitar' name='botao'>";
                    echo "</form>";
                }
            }
        }
    if($resultado_namoro){
        echo "Notificações de namoro: <br>";
        foreach ($resultado_namoro as $rn){
            $sql_pet = "select * from pet where idPet = '".$rn['idPet']."'";
                $resultado_pet = $conexao->consulta($sql_pet);
                if($resultado_pet){
					$imagem = $resultado_pet[0]['imagem'];
					echo "<img src='../ImgPerfil/".$imagem."' height=175px width=175px />";
                    echo $resultado_pet[0]["nome"]."<br>";
                    echo "<form action='processaSolicitacaoNamoro.php?id=".$resultado_pet[0]["idPet"]."' method='post'>";
                    echo "<input type='submit' value='Aceitar' name='botao'>";
                    echo "<input type='submit' value='Rejeitar' name='botao'>";
                    echo "</form>";
                }
            }
        }
	echo "</body>";
	echo "</html>";
?>