<?php
	$current_page = "historicotag";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/menu.php";
?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li class="active">Histórico de TAGs</li>
					</ol>
				</div>
			</div>
		
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
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Selecionar
						</button>
					</div>
				</div>

				<form>
					<div class="row">
						<div class="form-group col-xs-5">
							<label for="txtNomeAp">Nome:</label>
							<input type="text" class="form-control" id="txtNomeAp" disabled>
						</div>
						<div class="form-group col-xs-3">
							<label for="txtTipoAp">Tipo:</label>
							<input type="text" class="form-control" id="txtTipoAp" disabled>
						</div>
					</div>
				</form>
				
				<div class="row">
					<div class="col-xs-10">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th colspan=4>Histórico de acesso</td>
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
									<td>08:50</td>
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
									<td>14:28</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				
			</form>
		</div>
<?php	
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/footer.php";
?>

