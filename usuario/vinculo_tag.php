<?php
	$current_page = "usuario";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/menu.php";
?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li>
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/usuario/pesquisar_usuario.php">Usuários</a>
						</li>
						<li>
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/usuario/editar_usuario.php">Editar</a>
						</li>
						<li class="active">Desvincular Tag</li>
					</ol>
				</div>
			</div>
			<div class="form-group col-xs-5">
				<label for="SelMotivo">Selecione o motivo:</label>
				<br>
				<select class="form-control" id="SelMotivo">
					<option selected>selecione </option>
					<option value="Perda/Roubo">Perda/Roubo</option>
					<option value="Dano">Dano</option>
					<option value="Desligamento">Desligamento</option>
					<option value="Fim de projeto/pesquisa">Fim de projeto/pesquisa</option>
				</select>
			</div>
		
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
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/footer.php";
?>


	