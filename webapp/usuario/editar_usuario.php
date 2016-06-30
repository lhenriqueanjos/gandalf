<?php
	$current_page = "usuario";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";

	// abre a conexão
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

	// query para carregar a chave no input desabilitado
	$arr = $_POST['listaUsuarios'];
	foreach ($arr as $auxiliar) {

		// evitar sql inject
		$auxiliar = mysqli_real_escape_string($link, $auxiliar);

		// montagem da query
		$query = "SELECT matricula, nome, departamento, rua, numero, bairro, cep, cidade, estado, telefone, cpf, email 
				FROM usuario 
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
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/usuario/pesquisar_usuario.php">Usuários</a>
						</li>
						<li class="active">Editar</li>
					</ol>
				</div>
			</div>

			<form action="editar_usuario_action.php" method="POST">
				<div class="row">
					<div class="form-group col-xs-3">

						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Imagem</h3>
							</div>
							<div class="panel-body">
								<img src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/resources/images/3x4.jpg" 
									id="imgFoto" class="img-responsive" style="margin-bottom: 6pt;"> <!-- Deve carregar a foto do BD -->
								<label for="txtFoto">Alterar/Incluir Foto:</label>
								<input type="file" class="form-control" id="txtFoto">
							</div>
						</div>
					</div>
					
					<div class="form-group col-xs-9">
						<input type="hidden" class="form-control" id="txtHidden" name="txtHidden" required="required" value="1">
				
						<label for="txtNome">Nome: </label>
						<input type="text" class="form-control" id="txtNome" name="txtNome" required="required" value="<?=$row['nome']?>" >
					</div>

					<div class="form-group col-xs-3">
						<label for="txtMatricula">Matrícula:</label>
						<input type="number" step="0" class="form-control" id="txtMatricula" name="txtMatricula"
							value="<?=$row['matricula']?>" >
					</div>

					<div class="form-group col-xs-3">
						<label for="txtCPF">CPF:</label>
						<input type="text" class="form-control" id="cpf" name="txtCPF" maxlength="11" onKeyPress="jQuery();" 
							required="required" value="<?=$row['cpf']?>" >
					</div>

					<div class="form-group col-xs-3">
						<label for="txtCEP">CEP:</label>
						<input type="text" class="form-control" id="cep" name="txtCEP" maxlength="9" onblur="pesquisacep(this.value);" onKeyPress="jQuery();" value="<?=$row['cep']?>">
					</div>

					<div class="form-group col-xs-7">
						<label for="txtRua">Rua:</label>
						<input type="text" class="form-control" id="rua" name="txtRua" value="<?=$row['rua']?>" >
					</div>

					<div class="form-group col-xs-2">
						<label for="txtNumero">Número:</label>
						<input type="text" class="form-control" id="txtNumero" name="txtNumero" value="<?=$row['numero']?>" >
					</div>
					<div class="form-group col-xs-4">
						<label for="txtBairro">Bairro:</label>
						<input type="text" class="form-control" id="bairro" name="txtBairro" value="<?=$row['bairro']?>" >
					</div>

					<div class="form-group col-xs-3">
						<label for="txtCidade">Cidade:</label>
						<input type="text" class="form-control" id="cidade" name="txtCidade" value="<?=$row['cidade']?>" >
					</div>

					<div class="form-group col-xs-2">
						<label for="txtEstado">Estado:</label>
						<input type="text" class="form-control" id="uf" name="txtEstado" value="<?=$row['estado']?>" >
					</div>
				
					<div class="form-group col-xs-3">
						<label for="txtEmail">E-mail:</label>
						<input type="email" class="form-control" id="txtEmail" name="txtEmail" required="required" value="<?=$row['email']?>" >
					</div>
					<div class="form-group col-xs-3">
						<label for="txtTelefone">Telefone:</label>
						<input type="text" class="form-control" id="telefone" maxlength="18" name="txtTelefone" required="required" onKeyPress="jQuery();" value="<?=$row['telefone']?>" >
					</div>
					<div class="form-group col-xs-4">
						<label for="txtDepto">Departamento:</label>
						<input type="text" class="form-control" id="txtDepto" name="txtDepto" value="<?=$row['departamento']?>" >
					</div>
				
					<div class="form-group col-xs-4">
						<label for="txtTipo">Tipo:</label>
						<br>
						<select name="txtTipo" class="form-control" disabled>
							<option value="administrador">Administrador</option>
							<option value="administrador">Tag/Cartão</option>
							<option value="administrador" selected>Cliente</option>
						</select>
					</div>

					<div class="form-group col-xs-4">
						<label for="txtDepto">Senha:</label>
						<input type="password" class="form-control" id="txtSenha" name="txtSenha" required="required">
					</div>
				</div>

				
				<div class="row">
					<div class="form-group col-xs-12">
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
						</button>
						<button type="submit" class="btn btn-default" formaction="pesquisar_usuario.php" formnovalidate>
							<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Cancelar
						</button>
					</div>
				</div>
			</form>
		</div>
<?php	
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>


