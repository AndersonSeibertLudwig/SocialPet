<?php
session_start();
if(!isset($_SESSION["status"])){
    header("location: /socialpets/index.html");
}
if(!isset($_SESSION["pet"])){
	$_SESSION["pet"] = $_POST["botao"];
}
include_once "Pet.class.php";
include_once "../bd/MySQL.class.php";
$p = new Pet();
$p->getByIdUsuarioNomePet($_SESSION["id"],$_SESSION["pet"]);
$nome = $p->getNome();
$dataNascimento = $p->getDataDeNascimento();
$raca = $p->getRaca();
$pedigree = $p->getPedigree();
$adocao = $p->getAdocao();
$pais = $p->getPais();
$estado = $p->getEstado();
$cidade = $p->getcidade();
$idPet = $p->getIdPet();
$imagem = $p->getImagem();
$idUsuario = $p->getIdUsuario();
$_SESSION["idPet"] = $idPet;
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    
    <body>
            
        <div id="logoalteracad" height="100%" width="50%">
            <img src="../Imagens/logo.png" height="100%" width="50%">
        </div>
		<div>		
		
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#configPet"> Alterar Cadastro </button>
				<!-- Modal -->
				<div id="configPet" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"> Configurações </h4>
					  </div>
					  <div class="modal-body">
						<p>
							<form class="form-horizontal" name="formCadastro" action="alteraInfoPet.php" method="post">
                        <div class="control-group">
                            <label class="control-label" for="inputNome"> Nome: </label>
                            <div class="controls">
                                <input id="inputNome" class="form-control" type="text" name="nome" value="<?php echo $nome;?>">
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="inputRaca"> Raça: </label>
                            <div class="controls">
                                <input id="inputRaca" class="form-control" type="text" name="raca" value="<?php echo $raca;?>">
                            </div>
                        </div>
                        Pedigree:<input type="radio" size="34" name="pedigree" value="Sim" style="margin-left:2%" checked="<?php echo $pedigree == "sim" ? "checked": "Sim";?>"> Sim
								<input type="radio" size="34" name="pedigree" value="Não" style="margin-bottom:5%" checked="<?php echo $pedigree == "não" ? "checked": "Não";?>"> Não <br>
                        <div class="control-group">
                            <label class="control-label" for="inputDataNascimento"> Data de Nascimento: </label>
                            <div class="controls">
                                <input id="inputDataNascimento" class="form-control" type="text" name="dataNascimento" value="<?php echo $dataNascimento;?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPais"> Pais: </label>
                            <div class="controls">
                                <input id="inputPais" class="form-control" type="text" name="pais" value="<?php echo $pais;?>">
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label" for="inputEstado"> Estado: </label>
                            <div class="controls">
                                <input id="inputEstado" class="form-control" type="text" name="estado" value="<?php echo $estado;?>">
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label" for="inputCidade"> Cidade: </label>
                            <div class="controls">
                                <input id="inputCidade" class="form-control" type="text" name="cidade" value="<?php echo $cidade;?>">
                            </div>
                        </div>
						Disponível para adoção:<input type="radio" name="adocao" value="Sim" style="margin-left:2%" checked="<?php echo $adocao == "sim" ? "checked": "Sim";?>"> Sim
							<input type="radio" name="adocao" value="Não" style="margin-bottom:2%" checked="<?php echo $adocao == "não" ? "checked": "Não";?>"> Não <br>
						Imagem: <br>
						<?php
							echo "<img src='../ImgPerfil/".$imagem."' height=175px width=175px />";
						?>						
						<input class="form-control" type="file" name="imagem" style="width:100%;"> <br>
                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" class="form-control" name="botao" value="Editar">
                                <input type="submit" class="form-control" name="botao" value="Excluir Pet">
                            </div>
                        </div>
                </form>
						</p>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					  </div>
					</div>

				  </div>
				</div>
			<a href="../home.php" style="margin-left:20%"> Página Inicial </a>
			<a href="listaAmigos.php" style="margin-left:20%"> Lista de amigos </a>
			<a href="listaNamorados.php" style="margin-left:20%"> Lista de namorados </a>
			<form id="form" name="form" method="post" action="processaBusca.php">
				<div class="input-group" style="width: 45%; margin-top:2%; margin-left: 20%;">
					<input type="text" class="form-control" name="busca" id="busca" placeholder="Procure pets">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">Buscar</button>
					</span>
				</div>
			</form>
		</div>
		<div id="corpoFeedPet" style="background-color:#93DB70">
			<?php
				echo "<img src='../ImgPerfil/".$imagem."' height=175px width=175px/> <br>";
				echo $nome."<br>";
				echo $raca."<br>";
                $sql_amizade = "SELECT * FROM amizade WHERE idPet2 ='".$_SESSION['idPet']."'  AND confirmacao = 'solicitado'";
                $sql_namoro = "SELECT * FROM namoro WHERE idPet2 ='".$_SESSION['idPet']."'  AND confirmacao = 'solicitado'";
				$conexao = new MySQL();
                $resultado_amizade = $conexao->consulta($sql_amizade);
                $resultado_namoro = $conexao->consulta($sql_namoro);
                if($resultado_amizade || $resultado_namoro){
                    echo "<a href='solicitacao.php'>Você possui notificações</a>";            
                }
			?>
		</div>
    </body>
</html>
