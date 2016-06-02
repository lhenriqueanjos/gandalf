<?php
	$current_page = "tag";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/menu.php";
?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li>
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/tag/cadastrar_tag.php">TAGs</a>
						</li>
						<li class="active">Editar</li>
					</ol>
				</div>
			</div>
		
			<form>
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="txtChave">Chave:</label>
						<input type="number" class="form-control" id="txtChave" disabled>
					</div>
					<div class="form-group col-xs-3">
						<label for="txtTipo">Tipo:</label>
						<br>
						<select name="txtTipo" class="form-control">
							<option value="administrador">Administrador</option>
							<option value="administrador">Tag/Cartão</option>
							<option value="administrador" selected>Cliente</option>
						</select>
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


