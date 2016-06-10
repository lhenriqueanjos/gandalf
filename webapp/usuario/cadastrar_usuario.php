<?php
	$current_page = "usuario";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";
?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li>
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/usuario/pesquisar_usuario.php">Usuários</a>
						</li>
						<li class="active">Incluir</li>
					</ol>
				</div>
			</div>
		
			<form action="cadastrar_usuario_action.php" method="POST">
				<div class="row">
					<div class="form-group col-xs-9">
						<label for="txtNome">Nome:</label>
						<input type="text" class="form-control" id="txtNome" name="txtNome" required="required">
					</div>
					<div class="form-group col-xs-3">
						<label for="txtMatricula">Matrícula:</label>
						<input type="number" step="0" class="form-control" id="txtMatricula" name="txtMatricula" required="required">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-3">
						<label for="txtCEP">CEP:</label>
						<input type="text" class="form-control" id="cep" value="" name="txtCEP" maxlength="9" onblur="pesquisacep(this.value);" onKeyPress="jQuery();" required="required">
					</div>
					<div class="form-group col-xs-9">
						<label for="txtRua">Rua:</label>
						<input type="text" class="form-control" id="rua" name="txtRua" required="required">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-3">
						<label for="txtNumero">Número:</label>
						<input type="text" class="form-control" id="txtNumero" name="txtNumero" required="required">
					</div>
					<div class="form-group col-xs-5">
						<label for="txtBairro">Bairro:</label>
						<input type="text" class="form-control" id="bairro" name="txtBairro" required="required">
					</div>
					<div class="form-group col-xs-4">
						<label for="txtCidade">Cidade:</label>
						<input type="text" class="form-control" id="cidade" name="txtCidade" required="required">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-2">
						<label for="txtEstado">Estado:</label>
						<input type="text" class="form-control" id="uf" name="txtEstado" required="required">
					</div>
					<div class="form-group col-xs-6">
						<label for="txtEmail">E-mail:</label>
						<input type="email" class="form-control" id="txtEmail" name="txtEmail" required="required">
					</div>
					<div class="form-group col-xs-4">
						<label for="txtTelefone">Telefone:</label>
						<input type="text" class="form-control" id="telefone" maxlength="18" name="txtTelefone" onKeyPress="jQuery();" required="required">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="txtDepto">Departamento:</label>
						<input type="text" class="form-control" id="txtDepto" name="txtDepto" required="required">
					</div>
					<div class="form-group col-xs-6">
						<label for="txtCPF">CPF:</label>
						<input type="text" class="form-control" id="cpf" name="txtCPF" maxlength="11" onKeyPress="jQuery();" required="required">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="txtTag">Tag:</label> 
						<input type="number" step="0" class="form-control" id="txtTag" name="txtTag" disabled> <!- Este deve ficar inativo quando não for acessado por um administrador ->
					</div>
					<div class="form-group col-xs-5">
						<label for="txtTipo">Tipo:</label>
						<br>
						<select name="txtTipo" class="form-control" disabled>
							<option value="administrador">Administrador</option>
							<option value="administrador">Tag/Cartão</option>
							<option value="administrador" selected>Cliente</option>
						</select>
					</div>				
				</div>
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="txtFoto">Foto:</label>
						<input type="file" class="form-control" id="txtFoto" name="txtFoto">
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-xs-12">
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
						</button>
						<button type="submit" class="btn btn-default" formaction="pesquisar_usuario.php">
							<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Cancelar
						</button>
					</div>
				</div>
			</form>
		</div>
<?php	
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>


