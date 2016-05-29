<?php
	$current_page = "sala";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/menu.php";
?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li>
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/sala/pesquisar.php">Salas</a>
						</li>
						<li class="active">Incluir</li>
					</ol>
				</div>
			</div>
		
			<form>
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="txtNome">Nome:</label>
						<input type="text" class="form-control" id="txtNome">
					</div>
					<div class="form-group col-xs-2">
						<label for="txtNumero">Número:</label>
						<input type="number" step="0" class="form-control" id="txtNumero">
					</div>
					<div class="form-group col-xs-5">
						<label for="txtDescricao">Descrição:</label>
						<input type="text" class="form-control" id="txtDescricao">
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-xs-12">
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
						</button>
						<button type="submit" class="btn btn-default" formaction="pesquisar.php">
							<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Cancelar
						</button>
					</div>
				</div>
			</form>
		</div>
<?php	
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/footer.php";
?>


