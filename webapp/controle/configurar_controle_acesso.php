<?php
	$current_page = "controleacesso";

	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";
	
	// abrir conexão
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

	$idTagSelecionada = $_POST['selectTag'];

	$sqlUsuario = "SELECT usuario.nome, categoria_usuario.tipo, usuario.id ".
				"FROM rel_usuario_tag ".
				"JOIN usuario ON rel_usuario_tag.id_usuario = usuario.id ".
				"JOIN categoria_usuario ON categoria_usuario.id = usuario.id_categoria ".
				"WHERE rel_usuario_tag.id_tag = ".$idTagSelecionada." ".
				"AND rel_usuario_tag.data_fim is null";

	$resultUsuario = mysqli_query($link, $sqlUsuario);		

	$rowUsuario = mysqli_fetch_assoc($resultUsuario); 
	$totalUsuario = mysqli_num_rows($resultUsuario);

	$nomeUsuario = $rowUsuario['nome'];
	$categoriaUsuario = $rowUsuario['tipo'];
	$idUsuario = $rowUsuario['id'];

	// query para carregar a tabela de salas
	$sqlSala = "select s.id, s.nome from sala s order by s.nome;";
	$resultSala = mysqli_query($link, $sqlSala);
?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li>
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/controle/controle_acesso.php">Controle de Acesso</a>
						</li>
						<li class="active">Incluir regra de acesso</li>
					</ol>
				</div>
			</div>

			<form action="configurar_controle_acesso_action.php" method="POST" id="formDados">
				<div class="row">
					<div class="form-group col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Usuário</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="form-group col-xs-8">
										<label for="txtNomeAp">Nome:</label>
										<input type="text" class="form-control" id="txtNomeAp" value="<?=$nomeUsuario ?>" disabled> 
									</div>
									<div class="form-group col-xs-4">
										<label for="txtTipoAp">Tipo:</label>
										<input type="text" class="form-control" id="txtTipoAp" value="<?=$categoriaUsuario ?>" disabled>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-8">
						<div class="row">
							<div class="form-group col-xs-6">
								<label for="selTAG">Sala:</label>
								<select class="form-control" name="selectSala" id="selTAG">
									<option value="" selected>selecione</option>
									<?php
										while($row = mysqli_fetch_assoc($resultSala)) {
									?>
									<option value="<?=$row['id']?>" >
										<?=$row['nome']?>
									</option>
									<?php
										}
										
										// tira o resultado da busca da memória
										mysqli_free_result($resultSala);
									?>							
								</select>

								<input type="hidden" name="idTag" value="<?= $idTagSelecionada ?>">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-xs-6">
								<label for="txtHoraInicio">Hora inicial:</label>
								<input type="time" class="form-control" id="txtHoraInicio" name="txtHoraInicio" required>
							</div>
							<div class="form-group col-xs-6">
								<label for="txtHoraFim">Hora final:</label>
								<input type="time" class="form-control" id="txtHoraFim" name="txtHoraFim" required>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-xs-6">
								<label for="txtDataInicio">Data inicial:</label>
								<input type="date" class="form-control" id="txtDataInicio" name="txtDataInicio" required>
							</div>
							<div class="form-group col-xs-6">
								<label for="txtDataFim">Data final:</label>
								<input type="date" class="form-control" id="txtDataFim" name="txtDataFim">
							</div>
						</div>
					</div>
					<div class="form-group col-xs-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Dias</h3>
							</div>
							<div class="panel-body">
								<div class="checkbox">
									<label>
								    	<input name="chkDom" type="checkbox" data-dia="dom"> Domingo
									</label>
								</div>
								<div class="checkbox">
									<label>
								    	<input name="chkSeg" type="checkbox" data-dia="seg"> Segunda-feira
									</label>
								</div>
								<div class="checkbox">
									<label>
								    	<input name="chkTer" type="checkbox" data-dia="ter"> Terça-feira
									</label>
								</div>
								<div class="checkbox">
									<label>
								    	<input name="chkQua" type="checkbox" data-dia="qua"> Quarta-feira
									</label>
								</div>
								<div class="checkbox">
									<label>
								    	<input name="chkQui" type="checkbox" data-dia="qui"> Quinta-feira
									</label>
								</div>
								<div class="checkbox">
									<label>
								    	<input name="chkSex" type="checkbox" data-dia="sex"> Sexta-feira
									</label>
								</div>
								<div class="checkbox">
									<label>
								    	<input name="chkSab" type="checkbox" data-dia="sab"> Sábado
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-xs-12">
						<button type="submit" class="btn btn-default" onclick="valida()">
							<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
						</button>
						<button type="submit" class="btn btn-default" formaction="controle_acesso.php" formnovalidate>
							<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Cancelar
						</button>
					</div>
				</div>

			</form>

<?php	
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>

