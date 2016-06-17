<?php
	$current_page = "sala";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";

	$total = 0;
	$linha = NULL;

	// verifica se já clicou no pesquisar
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		// abrir conexão
		require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

		// variáveis para insert
		$nomeSala = $_POST['txtNome'];
		$numeroSala = $_POST['txtNumero'];
		$descricaoSala = $_POST['txtDescricao'];

		// evitar sql inject
		$nomeSala = mysqli_real_escape_string($link, $nomeSala);
		$numeroSala = mysqli_real_escape_string($link, $numeroSala);
		$descricaoSala = mysqli_real_escape_string($link, $descricaoSala);

		$whereAnd = "WHERE";

		// montagem da query
		$query = "SELECT id, numero, nome, descricao "
			."FROM sala ";

		if (!empty($nomeSala)) {
			$query = $query.$whereAnd." nome like '".$nomeSala."%' ";
			$whereAnd = "AND";
		}
		if (!empty($numeroSala)) {
			$query = $query.$whereAnd." numero = ".$numeroSala." ";
			$whereAnd = "AND";
		}
		if (!empty($descricaoSala)) {
			$query = $query.$whereAnd." descricao like '%".$descricaoSala."%' ";
		}
		$query = $query."order by nome;";

		$resultado = mysqli_query($link, $query) or die(mysqli_error());
		
		$linha = mysqli_fetch_assoc($resultado);

		$total = mysqli_num_rows($resultado);
	}
?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li class="active">Sala</li>
					</ol>
				</div>
			</div>
		
			<form action="#" method="POST">
				<div class="row">
					<div class="form-group col-xs-3">
						<label for="txtNome">Nome:</label>
						<input type="text" class="form-control" id="txtNome" name="txtNome">
					</div>
					<div class="form-group col-xs-2">
						<label for="txtNumero">Número:</label>
						<input type="number" step="0" class="form-control" id="txtNumero" name="txtNumero">
					</div>
					<div class="form-group col-xs-7">
						<label for="txtDescricao">Descrição:</label>
						<input type="text" class="form-control" id="txtDescricao" name="txtDescricao">
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-xs-12">
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pesquisar
						</button>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Salas</h3>
					</div>
					<div class="panel-body">

						<?php 
							// se o usuário tiver feito a pesquisa, exibe a tabela
							if(isset($_POST) and $total > 0) {
						?>
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<th style="width: 30px;" />
								<th>Nome</th>
								<th>Número</th>
								<th>Descrição</th>
							</thead>
							<tbody>
							<?php 
									// para cada linha retornada, criar um tr para exibir os dados
									do {
							 ?>
								<tr>
									<td>
										<input type="checkbox" name="listaSalas" value="<?=$linha['id']?>" />
									</td>
									<td><?=$linha['nome']?></td>
									<td><?=$linha['numero']?></td> 
									<td><?=$linha['descricao']?></td>
								</tr>
							<?php 
									} while($linha = mysqli_fetch_assoc($resultado));
									
									// tira o resultado da busca da memória
									mysqli_free_result($resultado);
							?>
							</tbody>
						</table>
						<?php 
							} else { 
							// caso não tenha pesquisado ou a pesquisa não tiver resultados, exibe mensagem amigável
						?>
							<span>
								Nenhum registro para exibir.
							</span>
						<?php 
							} 
						?>

						<div class="row">
							<div class="form-group col-xs-12">
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-xs-12">

						<!-- Botões sempre exibidos -->

						<button type="submit" class="btn btn-default" formaction="cadastrar.php">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Incluir
						</button>

						<?php 
							// se o usuário tiver feito a pesquisa, exibe a tabela
							if(isset($_POST) and $total > 0) {
						?>
							<!-- Botões exibidos apenas se tiver registros na tabela -->
							<button type="submit" class="btn btn-default" formaction="editar_sala.php">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
							</button>
							<button type="submit" class="btn btn-default" formaction="excluir_sala.php">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir
							</button>
						<?php 
							} 
						?>
					</div>
				</div>
			</form>
		</div>
<?php	
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>

