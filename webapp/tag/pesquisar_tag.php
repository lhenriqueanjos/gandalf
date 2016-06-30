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
	
	$var1 = " ";
	$var2 = " ";
	$var3 = 2; // TODO -> Substituir esse numero "2" pelo ID do usuario que esta logado
	
	// verifica se já clicou no pesquisar e consulta o banco de acordo com o select do usuário
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$opt = $_POST['opt'];
		
		// TODO incluir no filtro desse SQL a data fim da permissao = a NULL, para nao captar usuario inativo
		$sqlForm = "SELECT usuario.nome, categoria_usuario.tipo, usuario.id 
					FROM rel_usuario_tag
					JOIN usuario
					ON rel_usuario_tag.id_usuario = usuario.id
					JOIN categoria_usuario
					ON categoria_usuario.id = usuario.id_categoria
					WHERE rel_usuario_tag.id_usuario = $opt";
		$resultForm = mysqli_query($link, $sqlForm);		
		$rowForm = mysqli_fetch_assoc($resultForm); 
		
		$var1 = $rowForm['nome'];
		$var2 = $rowForm['tipo'];
		$var3 = $rowForm['id'];

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

			<form action="#" method="POST" id="selTAGform" onsubmit="return true">
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="selTAG">Chave:</label>
						<select class="form-control" id="selTAG" name="opt">
							<option value="" selected>selecione </option> <!-- Quando o login tiver implementado, fazer o value receber o id do usuario logado? -->
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
						<button type="submit" class="btn btn-default" onclick="valida()">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Selecionar
						</button>
					</div>
				</div>
			</form>
			
			<form>
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="txtNomeAp">Nome:</label>
						<input type="text" class="form-control" id="txtNomeAp" value="<?=$var1 ?>" disabled> 
					</div>
					<div class="form-group col-xs-3">
						<label for="txtTipoAp">Tipo:</label>
						<input type="text" class="form-control" id="txtTipoAp" value="<?=$var2 ?>" disabled>
					</div>
				</div>
			</form>
			
			<div class="row">
				<div class="col-xs-12">

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Últimos 5 acessos</h3>
						</div>
						<div class="panel-body">
							<table class="table table-bordered table-hover table-striped">
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
			</div>				
		</div>
<?php	
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>

