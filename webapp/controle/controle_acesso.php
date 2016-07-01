<?php
	$current_page = "controleacesso";

	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";
	
	// abrir conexão
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

	$idTagSelecionada = NULL;

	// query para carregar a tabela de tags
	$sql = "select t.id, t.codigo from tag t where exists(select * from rel_usuario_tag r where t.id = r.id_tag and r.data_fim is null);";
	$resultTags = mysqli_query($link, $sql);

	$totalPermissao = 0;
	$linhaPermissao = NULL;

	// verifica se já clicou no pesquisar
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		// variáveis para insert
		$idTagSelecionada = $_POST['selectTag'];

		// montagem da query
		$query = "SELECT permissao.id, ".
		    "sala.nome as nomeSala, ".
		    "hora_inicio, ".
		    "hora_fim, ".
		    "data_inicio_permissao, ".
		    "data_fim_permissao, ".
		    "segunda as seg, ".
		    "terca as ter, ".
		    "quarta as qua, ".
		    "quinta as qui, ".
		    "sexta as sex, ".
		    "sabado as sab, ".
		    "domingo as dom ".
			"FROM permissao ".
			"inner join sala on permissao.id_sala = sala.id ".
			"where id_tag = ".$idTagSelecionada;

		$resultadoPermissao = mysqli_query($link, $query);
		
		$linhaPermissao = mysqli_fetch_assoc($resultadoPermissao);

		$totalPermissao = mysqli_num_rows($resultadoPermissao);
	}

?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li class="active">Controle de Acesso</li>
					</ol>
				</div>
			</div>

			<form action="#" method="POST" id="selTAGform" onsubmit="return true">
				<div class="row">
					<div class="form-group col-xs-3">
						<label for="selTAG">TAG:</label>
						<select class="form-control" id="selTAG" name="selectTag">
							<option value="" selected>selecione</option>
							<?php
								while($row = mysqli_fetch_assoc($resultTags)) {
							?>
							<option value="<?=$row['id']?>" <?= ($row['id'] == $idTagSelecionada) ? 'selected' : '' ?> >
								<?=$row['codigo']?>
							</option>
							<?php
								}
								
								// tira o resultado da busca da memória
								mysqli_free_result($resultTags);
							?>							
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-12">
						<button type="submit" class="btn btn-default" onclick="valida()">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> selecionar
						</button>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Regras de acesso</h3>
					</div>
					<div class="panel-body">

						<?php 
							// se o usuário tiver feito a pesquisa, exibe a tabela
							if($_SERVER['REQUEST_METHOD'] == 'POST' and $totalPermissao > 0) {
						?>
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<th style="width: 30px;" />
								<th>Sala</th>
								<th>Início</th>
								<th>Fim</th>
								<th>Hr Início</th>
								<th>Hr Fim</th>
								<th>DOM</th>
								<th>SEG</th>
								<th>TER</th>
								<th>QUA</th>
								<th>QUI</th>
								<th>SEX</th>
								<th>SAB</th>
							</thead>
							<tbody>
							<?php 
									// para cada linhaPermissao retornada, criar um tr para exibir os dados
									do {
							 ?>
								<tr>
									<td>
										<input type="checkbox" name="listaPermissoes[]" value="<?=$linhaPermissao['id']?>" />
									</td>
									<td><?=$linhaPermissao['nomeSala']?></td>
									<td><?= date_format(date_create($linhaPermissao['data_inicio_permissao']), 'd/m/Y')?></td> 
									<td>
										<?php if (!empty($linhaPermissao['data_fim_permissao'])) {
											echo date_format(date_create($linhaPermissao['data_fim_permissao']), 'd/m/Y');
										} ?>
									</td>
									<td><?= date_format(date_create($linhaPermissao['hora_inicio']), 'H:i')?></td> 
									<td><?= date_format(date_create($linhaPermissao['hora_fim']), 'H:i') ?>
									</td>

									<td><?= ($linhaPermissao['dom'] == '1') ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>' ?></td>
									<td><?= ($linhaPermissao['seg'] == '1') ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>' ?></td>
									<td><?= ($linhaPermissao['ter'] == '1') ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>' ?></td>
									<td><?= ($linhaPermissao['qua'] == '1') ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>' ?></td>
									<td><?= ($linhaPermissao['qui'] == '1') ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>' ?></td>
									<td><?= ($linhaPermissao['sex'] == '1') ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>' ?></td>
									<td><?= ($linhaPermissao['sab'] == '1') ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>' ?></td>
								</tr>
							<?php 
									} while($linhaPermissao = mysqli_fetch_assoc($resultadoPermissao));
									
									// tira o resultado da busca da memória
									mysqli_free_result($resultadoPermissao);
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
					</div>
				</div>

				<div class="row">
					<div class="form-group col-xs-12">

						<?php 
							// se o usuário tiver feito a pesquisa
							if($_SERVER['REQUEST_METHOD'] == 'POST') {
						?>
						
						<button type="submit" class="btn btn-default" formaction="configurar_controle_acesso.php"
							onclick="valida()">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Incluir
						</button>

							<?php 
							// se o usuário tiver feito a pesquisa, exibe a tabela
							if($totalPermissao > 0) {
							?>

							<!-- Botões exibidos apenas se tiver registros na tabela -->
							<button type="submit" class="btn btn-default" formaction="editar_controle_acesso.php" onclick="testaCheck()">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
							</button>
							<button type="submit" class="btn btn-default" formaction="excluir_controle_acesso.php" onclick="testaCheckExc()">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir
							</button>
						<?php 
								}
							} 
						?>
					</div>
				</div>
			</form>
			
<?php	
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>

