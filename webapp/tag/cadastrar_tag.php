<?php
	$current_page = "tag";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";
?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li class="active">TAGs</li>
					</ol>
				</div>
			</div>
		
			<form>
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="txtChave">Chave:</label>
						<input type="number" class="form-control" id="txtChave">
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
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Incluir
						</button>
						<button type="submit" class="btn btn-default" formaction="pesquisar.php">
							<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Cancelar
						</button>
					</div>
				</div>
			</form>
			<form>
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="selTAG">Chave:</label>
						<select class="form-control" id="selTAG">
							<option selected>selecione </option>
							<option value="123456789">123456789</option>
							<option value="987654321">987654321</option>
							<option value="548768127">548768127</option>
						</select>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-xs-12">
						<button type="submit" class="btn btn-default" formaction="editar_tag.php">
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
						</button>
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir
						</button>
					</div>
				</div>
			</form>
		</div>
<?php	
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>


