<?php
	$current_page = "sala";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";
	
	// abre a conexão
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

	// query para carregar a chave no input desabilitado
	$arr = $_POST['listaSalas'];
	foreach ($arr as $auxiliar) {

		// evitar sql inject
		$auxiliar = mysqli_real_escape_string($link, $auxiliar);

		// montagem da query
		$query = "SELECT numero, nome, descricao 
				FROM sala 
				WHERE id = $auxiliar";
				
		// Executa a query
		$result = mysqli_query($link, $query);

		$total = mysqli_num_rows($result);
			
		$row = mysqli_fetch_assoc($result); 
	}

?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li>
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/sala/pesquisar.php">Sala</a>
						</li>
						<li class="active">Editar</li>
					</ol>
				</div>
			</div>
		
			<form action="editar_sala_action.php" method="POST">
				<div class="row">
					<div class="form-group col-xs-12">
						<input type="hidden" class="form-control" id="txtID" value="<?=$auxiliar?>" name="txtID">
					</div>
					<div class="form-group col-xs-5">
						<label for="txtNome">Nome:</label>
						<input type="text" class="form-control" id="txtNome" value="<?=$row['nome']?>" name="txtNome">
					</div>
					<div class="form-group col-xs-2">
						<label for="txtNumero">Número:</label>
						<input type="number" step="0" class="form-control" id="txtNumero" value="<?=$row['numero']?>" name="txtNumero">
					</div>
					<div class="form-group col-xs-5">
						<label for="txtDescricao">Descrição:</label>
						<input type="text" class="form-control" id="txtDescricao" value="<?=$row['descricao']?>" name="txtDescricao">
					</div>
				</div>
								
				<div class="row">
					<div class="form-group col-xs-12">
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
						</button>
						<button type="submit" class="btn btn-default" formaction="pesquisar.php" formnovalidate>
							<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Cancelar
						</button>
					</div>
				</div>
			</form>
		</div>
<?php	
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>

