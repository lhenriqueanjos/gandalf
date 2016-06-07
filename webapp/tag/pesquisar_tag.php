<?php
	$current_page = "historicotag";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";
	
	// abrir conexão
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

	// query para carregar a tabela de tags
	$sql = "SELECT id, codigo FROM tag"; // TODO -> associar ao usuário logado, para puxar o histórico correto
	$result = mysqli_query($link, $sql);

	$total = mysqli_num_rows($result);
    
    $row = mysqli_fetch_assoc($result); 
	
	$opt = " ";
	
	// verifica se já clicou no pesquisar e consulta o banco de acordo com o select do usuário
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$opt = $_POST['opt'];
		
		// $sqlForm = "SELECT id_usuario FROM tag";
		// $resultForm = mysqli_query($link, $sql);

		// $totalForm = mysqli_num_rows($result);
		
		// $rowForm = mysqli_fetch_assoc($result); 
		
	}
?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li class="active">Histórico de TAGs</li>
					</ol>
				</div>
			</div>

			<form action="#" method="POST">
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="selTAG">Chave:</label>
						<select class="form-control" id="selTAG" name="opt">
							<option selected>selecione </option>
							<?php
								do {
							?>
							<option value="<?=$row['id']?>"><?=$row['codigo']?></option>
							<?php
								}while($row = mysqli_fetch_assoc($result));
								
								// tira o resultado da busca da memória
								mysqli_free_result($result);
							?>							
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
			</form>
			
			<form>
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="txtNomeAp">Nome:</label>
						<input type="text" class="form-control" id="txtNomeAp" value="<?=$opt ?>" disabled> 
					</div>
					<div class="form-group col-xs-3">
						<label for="txtTipoAp">Tipo:</label>
						<input type="text" class="form-control" id="txtTipoAp" value="<?=$opt ?>" disabled>
					</div>
				</div>
			</form>
			
			<div class="row">
				<div class="col-xs-10">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th colspan=2>Últimos 5 acessos</td>
							</tr>
						</thead>
						<thead>
							<th>Acesso</th>
							<th>Local</th>
						</thead>
						<tbody>
						<?php include $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/tag/pesquisar_tag_historico.php"; ?>
						</tbody>
					</table>
				</div>
			</div>				
		</div>
<?php	
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>

