<?php
	$current_page = "usuario";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/menu.php";
?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li class="active">Usuários</li>
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
						<label for="txtMatricula">Matrícula:</label>
						<input type="number" step="0" class="form-control" id="txtMatricula">
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-xs-12">
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pesquisar
						</button>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-12">
						<table class="table table-bordered">
							<thead>
								<th>Nome</th>
								<th>Matrículacula</th>
								<th>Tipo de Usuário</th>
							</thead>
							<tbody>
								<tr>
									<td>Amélia Sardina</td>
									<td>64547</td> 
									<td>Administrador</td>
								</tr>
								<tr>
									<td>Anita Belo</td>
									<td>68452</td> 
									<td>Cliente</td>
								</tr>
								<tr>
									<td>Bartolomeu Paes</td>
									<td>67654</td> 
									<td>Cliente</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-xs-12">
						<button type="submit" class="btn btn-default" formaction="cadastrar_usuario.php">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Incluir
						</button>
						<button type="submit" class="btn btn-default">
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
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/footer.php";
?>

