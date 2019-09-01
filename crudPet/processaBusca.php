<?php
session_start();
        if(!isset($_SESSION["status"])){
            echo "<script>alert('Você precisa estar logado para visualizar esta página!');"
                . "location.href='../index.html';</script>";
    }
?>
<html>
    <head>
        <meta charset="utf-8"> 
        <title>
            Social Pets
        </title>
        <link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
        <link rel="stylesheet" href="../css/css/bootstrap.css">
        <style>
        .form-field{width:200px; float:left;}
        .clear-both{clear:both}
        </style>
    </head>
    
    <body>
            
        <div id="logoalteracad" height="100%" width="50%">
            <img src="../Imagens/logo.png" height="100%" width="50%">
        </div>
<?php	
	include("../bd/MySQL.class.php");
	echo '<a href="homePet.php" style="text-align:left";> Voltar </a>';
	if(isset($_POST)){
		$conexao = new MySQL();
		$busca = $_POST['busca'];
		if($_POST['busca'] != ''){
			$sql = "select * from pet where nome like '%$busca%'";
			$pets = $conexao->consulta($sql);
			if($pets){
				foreach ($pets as $p) {
					$caminho= $p["imagem"];
					$nome = $p["nome"];
					$id = $p["idPet"];
					$sql1 = "select count(idpet) qtd from amizade where idPet = ".$_SESSION['idPet']." and idPet2=".$id." or idPet = ".$id." and idPet2=".$_SESSION['idPet']." ;";
					$sql2 = "select count(idpet) qtd from namoro where idPet = ".$_SESSION['idPet']." and idPet2=".$id." or idPet = ".$id." and idPet2=".$_SESSION['idPet']." ;";
					$qtd = $conexao->consulta($sql1)[0]['qtd'];
					$qtd2 = $conexao->consulta($sql2)[0]['qtd'];
					if($id != $_SESSION['idPet'] && $qtd==0){
                        echo "<tr>";
                        echo "<td> <img src='$caminho' height=75px width=75px title='".$p['nome']."'/></td>";
                        echo "<td> $nome</td>";
                        echo "<td> <a href='processaAmizade.php?id=".$id."'>Solicitar amizade</a></td>";
						if($qtd2==0){
							echo "<td> <a href='processaNamoro.php?id=".$id."'>Solicitar namoro</a></td>";
						}
						echo "<br>";
                        echo "</tr><table>";
                    }
                    else if($id != $_SESSION['idPet'] && $qtd!=0){
                        echo "<tr>";
                        echo "<td><img src='$caminho' height=75px width=75px title='".$p['nome']."'/></td>";
                        echo "<td> $nome</td>";
						if($qtd2==0){
							echo "<td><a href='processaNamoro.php?id=".$id."'>Solicitar namoro</a>";
						}
						echo "<br>";
                        echo "</tr>";
                    }
				}
			}
			else{
			echo 'Nenhum pet encontrado';
			}
		}
		else{
			echo "Preencha o campo busca corretamente";
		}
	}
?>
</body>
</html>
