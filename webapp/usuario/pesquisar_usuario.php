<?php
	$current_page = "usuario";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";

	$total = 0;
	$linha = NULL;

	// verifica se já clicou no pesquisar
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		// abrir conexão
		require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

		// variáveis para insert
		$nomeUsuario = $_POST['txtNome'];
		$matriculaUsuario = $_POST['txtMatricula'];

		// evitar sql inject
		$nomeUsuario = mysqli_real_escape_string($link, $nomeUsuario);
		$matriculaUsuario = mysqli_real_escape_string($link, $matriculaUsuario);
		
		$whereAnd = "WHERE";

		// montagem da query
		$query = "SELECT id, nome, matricula, id_categoria "
			."FROM usuario ";

		if (!empty($nomeUsuario)) {
			$query = $query.$whereAnd." nome like '".$nomeUsuario."%' ";
			$whereAnd = "AND";
		}
		if (!empty($matriculaUsuario)) {
			$query = $query.$whereAnd." matricula = ".$matriculaUsuario." ";
		}

		$query = $query."order by nome;";

		$resultado = mysqli_query($link, $query) or die(mysql_error());
		
		$linha = mysqli_fetch_assoc($resultado);
		
		// // query para selecionar o tipo conforme a id_categoria
		// $queryCategoria = "SELECT tipo FROM categoria_usuario WHERE id = ".$linha['id_categoria']." ";

		// $resultado2 = mysqli_query($link, $queryCategoria) or die(mysqli_error($link));

		// $row = mysqli_fetch_assoc($resultado2);
		// //

		$total = mysqli_num_rows($resultado);
	}
?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li class="active">Usuários</li>
					</ol>
				</div>
			</div>
		
			<form action="#" method="POST">
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="txtNome">Nome:</label>
						<input type="text" class="form-control" id="txtNome" name="txtNome">
					</div>
					<div class="form-group col-xs-3">
						<label for="txtMatricula">Matrícula:</label>
						<input type="number" step="0" class="form-control" id="txtMatricula" name="txtMatricula">
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
						<h3 class="panel-title">Usuários</h3>
					</div>
					<div class="panel-body">

						<?php 
							// se o usuário tiver feito a pesquisa, exibe a tabela
							if(isset($_POST) and $total > 0) {
						?>
						<table class="table table-bordered table-hover">
							<thead>
								<th style="width: 30px;" />
								<th>Nome</th>
								<th>Matrícula</th>
								<th>Tipo de Usuário</th>
							</thead>
							<tbody>
							<?php 
									// para cada linha retornada, criar um tr para exibir os dados
									do {
							 ?>
								<tr>
									<td>
										<input type="checkbox" name="<?=$linha['id']?>" />
									</td>
									<td><?=$linha['nome']?></td>
									<td><?=$linha['matricula']?></td> 
									<td><?php require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/usuario/consulta_id.php"; ?><?=$row['tipo'] ?></td>
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

						<button type="submit" class="btn btn-default" formaction="cadastrar_usuario.php">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Incluir
						</button>

						<?php 
							// se o usuário tiver feito a pesquisa, exibe a tabela
							if(isset($_POST) and $total > 0) {
						?>
							<!-- Botões exibidos apenas se tiver registros na tabela -->
							<button type="submit" class="btn btn-default">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
							</button>
							<button type="submit" class="btn btn-default">
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

