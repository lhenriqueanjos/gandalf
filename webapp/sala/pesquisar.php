<?php
	$current_page = "sala";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";
?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li class="active">Sala</li>
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
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pesquisar
						</button>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-12">
						<table class="table table-bordered table-hover">
							<thead>
								<th>Local</th>
								<th>Número</th>
								<th>Descrição</th>
							</thead>
							<tbody>
								<tr>
									<td>LABINFO 1</td>
									<td>1</td> 
									<td>Labortório de Informática 1</td>
								</tr>
								<tr>
									<td>LABINFO 2</td>
									<td>2</td> 
									<td>Labortório de Informática 2</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-xs-12">
						<button type="submit" class="btn btn-default" formaction="cadastrar.php">
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
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>

