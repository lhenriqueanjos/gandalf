<?php
	$current_page = "tag";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";
	
	// abrir conexão
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

	// query para carregar a tabela de tags
	$sql = "SELECT id, codigo, id_categoria FROM tag"; // TODO -> associar ao usuário logado, para puxar o histórico correto
	$result = mysqli_query($link, $sql);

	$total = mysqli_num_rows($result);
    
    $row = mysqli_fetch_assoc($result); 

	// query para carregar o select do tipo da tag
	$sqlTipoTag = "SELECT id, tipo FROM categoria_tag"; // TODO -> associar ao usuário logado, para puxar o histórico correto
	$resultTipoTag = mysqli_query($link, $sqlTipoTag);

	$totalTipoTag = mysqli_num_rows($resultTipoTag);
    
    $rowTipoTag = mysqli_fetch_assoc($resultTipoTag); 

?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li class="active">TAGs</li>
					</ol>
				</div>
			</div>
		
			<form method="POST" action="cadastrar_tag_action.php">
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="txtChave">Chave:</label>
						<input type="number" class="form-control" id="txtChave" name="numTag">
					</div>
					<div class="form-group col-xs-3">
						<label for="txtTipo">Tipo:</label>
						<br>
						<select class="form-control" id="selTAG" name="optTipoTag">
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
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Incluir
						</button>
						<button type="submit" class="btn btn-default" formaction="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/tag/cadastrar_tag.php">
							<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Cancelar
						</button>
					</div>
				</div>
			</form>
			
			<form action="#" method="POST">
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="selTAG">Chave:</label>
						<select class="form-control" id="selTAG" name="optChave">
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
						<button type="submit" class="btn btn-default" formaction="editar_tag.php">
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
						</button>
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir
						</button>
					</div>
				</div>
			</form>
		</div>
<?php	
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>


