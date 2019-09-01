<?php
session_start();
if(!isset($_SESSION["status"])){
	header("location: index.html");
}
unset ($_SESSION["pet"]);
unset ($_SESSION["idPet"]);
include_once "crudPet/Pet.class.php";
include_once "Usuario.class.php";
include_once "./bd/MySQL.class.php";
$u = new Usuario();
$u->getById($_SESSION["id"]);
$nome = $u->getNome();
$sobrenome = $u->getSobrenome();
$email = $u->getEmail();
$telefone = $u->getTelefone();
$senha = $u->getSenha();
?>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title>
            Social Pets
        </title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <link rel="stylesheet" href="css/css/bootstrap.css">
        <style>
        .form-field{width:200px; float:left;}
        .clear-both{clear:both}
        </style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="js/js.js"> </script>
    </head>
    
    <body>
            
        <div id="logoalteracad">
            <img src="Imagens/logo.png" height="100%" width="50%">
        </div>
		
		<div id="fundohome">
		<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#alteraCad"> Alterar Cadastro </button>
				<!-- Modal -->
				<div id="alteraCad" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"> Altere seu cadastro </h4>
					  </div>
					  <div class="modal-body">
						<p>
							<form class="form-horizontal" name="formCadastro" action="alteraInfo.php" method="post">
                        <div class="control-group">
                            <label class="control-label" for="inputNome"> Nome: </label>
                            <div class="controls">
                                <input id="inputNome" class="form-control" type="text" name="nome" value="<?php echo $nome;?>">
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="inputSobrenome"> Sobrenome: </label>
                            <div class="controls">
                                <input id="inputSobrenome" class="form-control" type="text" name="sobrenome" value="<?php echo $sobrenome;?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail"> Email: </label>
                            <div class="controls">
                                <input id="inputEmail" class="form-control" type="text" name="email" value="<?php echo $email;?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputTelefone"> Telefone: </label>
                            <div class="controls">
                                <input id="inputTelefone" class="form-control" type="text" name="telefone" value="<?php echo $telefone;?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputSenha"> Senha: </label>
                            <div class="controls">
                                <input id="inputSenha" class="form-control" type="password" name="senha">
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label" for="inputSenha"> Confirmar Senha: </label>
                            <div class="controls">
                                <input id="inputSenha" class="form-control" type="password" name="confirma">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" class="form-control" name="botao" value="Editar">
                                <input type="submit" class="form-control" name="botao" value="Excluir Conta">
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
				
			<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#logout"> Logout </button>
		<!-- Modal -->
			<div id="logout" class="modal fade" role="dialog">
				<div class="modal-dialog">
				<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"> Você realmente deseja fazer logout? </h4>
						</div>
					    <div class="modal-body">
							<div class="row">
								<div class="col-md-3">
								</div>
								<div class="col-md-6">
									<form action="sair.php" method="post">
										<button type="submit" class="btn btn-default"> Sim </button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
									</form>
								</div>
								<div class="col-md-3">
								</div>
							</div>
							
								
							
						</div>
					</div>
				</div>
			</div>
			
			<!-- Trigger the modal with a button -->
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#novoPet"> Adicionar novo pet </button>	
				<!-- Modal -->
				<div id="novoPet" class="modal fade" role="dialog">
				  <div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"> Cadastre um novo pet </h4>
					  </div>
					  <div class="modal-body">
						<p>
							<form name="formCadastro" action="crudPet/processaPet.php" method="post" enctype="multipart/form-data">					
								Nome: <input class="form-control" type="text" name="nome" size="34" style="margin-bottom:2%"> <br>
								Raça: <input class="form-control" type="text" name="raca" size="34" style="margin-bottom:2%"> <br>
								Pedigree:<input type="radio" size="34" name="pedigree" value="Sim" style="margin-left:2%"> Sim
								<input type="radio" size="34" name="pedigree" value="Não" style="margin-bottom:5%"> Não <br>
								Data de Nascimento:<input class="form-control" type="text" size="34" name="dataNascimento" style="margin-bottom:2%"> <br>
								País:<input class="form-control" type="text" size="34" name="pais" style="margin-bottom:2%"> <br>
								Estado:<input class="form-control" type="text" size="34" name="estado" style="margin-bottom:2%"> <br>
								Cidade:<input class="form-control" type="text" size="34" name="cidade" style="margin-bottom:2%"> <br>
								Disponível para adoção:<input type="radio" size="34" name="adocao" value="Sim" style="margin-left:2%"> Sim
								<input type="radio" size="34" name="adocao" value="Não" style="margin-bottom:2%"> Não <br>
								Imagem: <input class="form-control" type="file" name="imagem" style="width:100%;"> <br>
								<input class="form-control" type="submit" name="botao" value="Cadastrar Pet">
							</form>	
						</p>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					  </div>
					</div>

				  </div>
				</div>
		<?php	
			echo '<div id ="listaPets">';
				echo "Meus Pets:"."<br>";
				$pet = new Pet();
				$pets = $pet->getByIdUsuario($_SESSION["id"]);
				if($pets!= "Nenhum"){
					if($pets[1]==FALSE){
						echo '<form action="crudPet/homePet.php" method="post">';
						echo '<input type="submit" name="botao" action="crudPet/homePet.php" method="post" value="'.$pets[0]->getNome().'">';
						echo '</form>';
					}
					else{
						foreach($pets as $p){
							echo '<form action="crudPet/homePet.php" method="post">';
							echo '<input type="submit" name="botao" action="crudPet/homePet.php" method="post" value="'.$p->getNome().'">';
							echo '</form>';
						}
					}
				}
				else{
					echo "Nenhum pet cadastrado!";
				}
			echo '</div>';
		?>
		</div>
    </body>
</html>