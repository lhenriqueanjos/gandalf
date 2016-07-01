<?php
	$current_page = "associartag";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";
	
	// abrir conexão
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

	// query para carregar a tabela de tags
	$sql = "SELECT tag.codigo, rel_usuario_tag.id, tag.id as idx
			FROM tag
			LEFT JOIN rel_usuario_tag
			ON tag.id = rel_usuario_tag.id_tag
			WHERE rel_usuario_tag.id is NULL
			ORDER BY rel_usuario_tag.id ASC";
	$result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result); 

	// query para carregar os dados do usuario selecionado
	$arr = $_POST['listaUsuarios'];
	foreach ($arr as $auxiliar) {

		$sqlUsuario = "SELECT * FROM usuario WHERE id = $auxiliar";
		$resultUsuario = mysqli_query($link, $sqlUsuario);
		$rowUsuario = mysqli_fetch_assoc($resultUsuario);
	}
?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li>
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/associar_tag/pesquisa.php">Pesquisa</a>
						</li>
						<li class="active">Associar</li>
					</ol>
				</div>
			</div>

			<form action="associar_action.php" method="POST" id="selTAGform" onsubmit="return true">
				<div class="row">
					<div class="form-group col-xs-5">
						<h4>Nome: <?= $rowUsuario['nome']?>
						<?php if($rowUsuario['matricula']){ ?>
						<br>Matrícula: <?= $rowUsuario['matricula']?></h4>
						<?php } ?>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="selTAG">Chave:</label>
						<select class="form-control" id="selTAG" name="opt">
							<option value="">selecione </option>
							<?php
								do {
							?>
							<option value="<?=$row['idx']?>"><?=$row['codigo']?></option>
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
						<div class="form-group col-xs-12">
							<input type="hidden" class="form-control" id="txtID" value="<?=$auxiliar?>" name="txtID">
						</div>
						<button type="submit" class="btn btn-default" onclick="valida()">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Selecionar
						</button>
					</div>
				</div>
			</form>
		</div>
<?php	
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>

