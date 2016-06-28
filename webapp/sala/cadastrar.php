<?php
	$current_page = "sala";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";
?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li>
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/sala/pesquisar.php">Sala</a>
						</li>
						<li class="active">Incluir</li>
					</ol>
				</div>
			</div>
		
			<form action="cadastrar_sala_action.php" method="POST">
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="txtNome">Nome:</label>
						<input type="text" class="form-control" id="txtNome" name="txtNome" required="required">
					</div>
					<div class="form-group col-xs-2">
						<label for="txtNumero">Número:</label>
						<input type="number" step="0" class="form-control" id="txtNumero" name="txtNumero" required="required">
					</div>
					<div class="form-group col-xs-5">
						<label for="txtDescricao">Descrição:</label>
						<input type="text" class="form-control" id="txtDescricao" name="txtDescricao">
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


