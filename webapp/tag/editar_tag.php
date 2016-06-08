<?php
	$current_page = "tag";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";
	
	// abre a conexão
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";
	
	$auxiliar = $_POST['optChave'];
	
	// query para carregar o select do tipo da tag
	$sqlTipoTag = "SELECT id, tipo FROM categoria_tag";
	$resultTipoTag = mysqli_query($link, $sqlTipoTag);

	$totalTipoTag = mysqli_num_rows($resultTipoTag);
    
    $rowTipoTag = mysqli_fetch_assoc($resultTipoTag); 
	
	// query para carregar a chave no input desabilitado
	$sql = "SELECT codigo FROM tag WHERE id = $auxiliar"; // TODO -> associar ao usuário logado, para puxar o histórico correto
	$result = mysqli_query($link, $sql);

	$total = mysqli_num_rows($result);
    
    $row = mysqli_fetch_assoc($result); 
	
	$auxiliar2 = $row['codigo'];

?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li>
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/tag/cadastrar_tag.php">TAGs</a>
						</li>
						<li class="active">Editar</li>
					</ol>
				</div>
			</div>
		
			<form action="editar_tag_action.php" method="POST">
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="txtChave">Chave:</label>
						<input type="number" class="form-control" id="txtChave" name="txtChave" value="<?php echo $auxiliar2; ?>" readonly>
					</div>
					<div class="form-group col-xs-3">
						<label for="txtTipo">Tipo:</label>
						<br>
						<select name="txtTipo" class="form-control">
							<?php
								do {
							?>
							<option value="<?=$rowTipoTag['id']?>" <?php $aux = $rowTipoTag['tipo']; if($aux == "Cliente"){echo "selected";} ?>><?=$rowTipoTag['tipo']?></option>
							<?php
								}while($rowTipoTag = mysqli_fetch_assoc($resultTipoTag));
								
								// tira o resultado da busca da memória
								mysqli_free_result($resultTipoTag);
							?>							
						</select>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-xs-12">
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
						</button>
						<button type="submit" class="btn btn-default"  formaction="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/tag/cadastrar_tag.php">
							<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Cancelar
						</button>
					</div>
				</div>
			</form>
		</div>
<?php	
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>


