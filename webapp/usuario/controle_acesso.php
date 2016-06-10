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
						<li>
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/usuario/editar_usuario.php">Editar</a>
						</li>
						<li class="active">Controle de Acesso</li>
					</ol>
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

			<div class="form-group col-xs-5">
				<label for="selectLab">Local:</label>
				<br>
				<select name="selectLab" class="form-control" id="selectLab">
					<option selected>selecione uma opção</option>
					<option value="Laboratório 1">Laboratório 1</option>
					<option value="Laboratório 2">Laboratório 2</option>
				</select>
			</div>
			<div class="form-group col-xs-2">
				<label for="selectInicio">Início:</label>
				<br>
				<select name="selectInicio" class="form-control" id="selectInicio">
					<option selected>selecione</option>
					<option value="08:00">08:00</option>
					<option value="09:00">09:00</option>
					<option value="10:00">10:00</option>
					<option value="11:00">11:00</option>
					<option value="12:00">12:00</option>
					<option value="13:00">13:00</option>
					<option value="14:00">14:00</option>
					<option value="15:00">15:00</option>
					<option value="16:00">16:00</option>
					<option value="17:00">17:00</option>
					<option value="18:00">18:00</option>
					<option value="19:00">19:00</option>
					<option value="20:00">20:00</option>
					<option value="21:00">21:00</option>
					<option value="22:00">22:00</option>
				</select>
			</div>
			<div class="form-group col-xs-2">
				<label for="selectFim">Fim:</label>
				<br>
				<select name="selectFim" class="form-control" id="selectFim">
					<option selected>selecione</option>
					<option value="08:00">08:00</option>
					<option value="09:00">09:00</option>
					<option value="10:00">10:00</option>
					<option value="11:00">11:00</option>
					<option value="12:00">12:00</option>
					<option value="13:00">13:00</option>
					<option value="14:00">14:00</option>
					<option value="15:00">15:00</option>
					<option value="16:00">16:00</option>
					<option value="17:00">17:00</option>
					<option value="18:00">18:00</option>
					<option value="19:00">19:00</option>
					<option value="20:00">20:00</option>
					<option value="21:00">21:00</option>
					<option value="22:00">22:00</option>
				</select>
			</div>
			<div class="row">
				<div class="form-group col-xs-12">
					<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar
					</button>
					<button type="submit" class="btn btn-default" formaction="pesquisar.php">
						<span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Remover
					</button>
				</div>
			</div>
			<br><br>
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
		</div>
<?php	
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>


	