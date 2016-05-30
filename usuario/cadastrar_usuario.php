<?php
	$current_page = "usuario";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/menu.php";
?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li>
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/usuario/pesquisar_usuario.php">Usuários</a>
						</li>
						<li class="active">Incluir</li>
					</ol>
				</div>
			</div>
		
			<form>
				<div class="row">
					<div class="form-group col-xs-7">
						<label for="txtNome">Nome:</label>
						<input type="text" class="form-control" id="txtNome">
					</div>
					<div class="form-group col-xs-3">
						<label for="txtMatricula">Matrícula:</label>
						<input type="number" step="0" class="form-control" id="txtMatricula">
					</div>
					<div class="form-group col-xs-8">
						<label for="txtDepto">Rua:</label>
						<input type="text" class="form-control" id="txtDepto">
					</div>
					<div class="form-group col-xs-2">
						<label for="txtDepto">Número:</label>
						<input type="text" class="form-control" id="txtDepto">
					</div>
					<div class="form-group col-xs-3">
						<label for="txtDepto">Bairro:</label>
						<input type="text" class="form-control" id="txtDepto">
					</div>
					<div class="form-group col-xs-3">
						<label for="txtDepto">CEP:</label>
						<input type="text" class="form-control" id="txtDepto">
					</div>
					<div class="form-group col-xs-4">
						<label for="txtDepto">Cidade:</label>
						<input type="text" class="form-control" id="txtDepto">
					</div>
					<div class="form-group col-xs-4">
						<label for="txtDepto">Estado:</label>
						<input type="text" class="form-control" id="txtDepto">
					</div>
					<div class="form-group col-xs-6">
						<label for="txtEmail">E-mail:</label>
						<input type="email" class="form-control" id="txtEmail">
					</div>
					<div class="form-group col-xs-4">
						<label for="txtTelefone">Telefone:</label>
						<input type="text" class="form-control" id="txtTelefone" maxlength="18">
					</div>
					<div class="form-group col-xs-6">
						<label for="txtDepto">Departamento:</label>
						<input type="text" class="form-control" id="txtDepto">
					</div>
					<div class="form-group col-xs-5">
						<label for="txtTag">Tag:</label> 
						<input type="number" step="0" class="form-control" id="txtTag" disabled> <!- Este deve ficar inativo quando não for acessado por um administrador ->
					</div>
					<div class="form-group col-xs-5">
						<label for="txtTipo">Tipo:</label>
						<br>
						<select name="txtTipo" class="form-control">
							<option value="administrador">Administrador</option>
							<option value="administrador">Tag/Cartão</option>
							<option value="administrador" selected>Cliente</option>
						</select>
					</div>
					<div class="form-group col-xs-5">
						<label for="txtFoto">Foto:</label>
						<input type="file" class="form-control" id="txtFoto">
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


