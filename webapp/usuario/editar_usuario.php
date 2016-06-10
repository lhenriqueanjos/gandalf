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
						<li class="active">Editar</li>
					</ol>
				</div>
			</div>
		
			<div class="form-group col-xs-5">
				<img src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/teste/imagem_teste.jpg" id="imgFoto"> <!- Deve carregar a foto do BD ->
			</div>
			<div class="form-group col-xs-5">
				<label for="txtFoto">Alterar/Incluir Foto:</label>
				<input type="file" class="form-control" id="txtFoto">
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
						<select name="txtTipo" class="form-control" disabled>
							<option value="Administrador">Administrador</option>
							<option value="Tag/Cartão">Tag/Cartão</option>
							<option value="Cliente" selected>Cliente</option>
						</select>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th colspan=4>Permissoes de acesso</td>
								</tr>
							</thead>
							<thead>
								<th>Local</th>
								<th>Dia</th>
								<th>Início</th>
								<th>Fim</th>
							</thead>
							<tbody>
								<tr>
									<td>Laboratório 1</td>
									<td>segunda</td> 
									<td>08:00</td>
									<td>09:00</td>
								</tr>
								<tr>
									<td>Laboratório 1</td>
									<td>terça</td> 
									<td>11:00</td>
									<td>12:00</td>
								</tr>
								<tr>
									<td>Laboratório 2</td>
									<td>terça</td> 
									<td>13:00</td>
									<td>15:00</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-xs-5">
						<button type="submit" class="btn btn-primary btn-block" formaction="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/usuario/controle_acesso.php">
							<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Permissões de Acesso
						</button>
						<button type="submit" class="btn btn-primary btn-block" formaction="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/usuario/vinculo_tag.php">
							<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> Desvincular de Tag
						</button>
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
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>


