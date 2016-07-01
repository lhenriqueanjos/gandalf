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
	
	// executado somente após o usuario enviar o formulario
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
	// variáveis para insert
	$idCategoria = $_POST['optTipoTag'];
	$numeroTag = $_POST['numTag'];
	$senha = $_POST['txtSenha'];

	// verificar se a tag ja existe
	$query = "SELECT codigo
			FROM tag
			WHERE codigo = $numeroTag";

	$resultado = mysqli_query($link, $query);
	$total = mysqli_num_rows($resultado);

	$erro = false;
	$erro_tag = false;
	$erro_senha = false;

	if ($total > 0){
		$erro = true;
		$erro_tag = "Código já cadastrado";
	}else{
		// evitar sql inject
		$idCategoria = mysqli_real_escape_string($link, $idCategoria);
		$numeroTag = mysqli_real_escape_string($link, $numeroTag);
		$senha = mysqli_real_escape_string($link, $senha);

		// montagem da query
		$query = "INSERT INTO tag (id_categoria, codigo, senha) VALUES (".$idCategoria.", ".$numeroTag.", MD5('".$senha."'))";

		// Executa a query
		$inserir = mysqli_query($link, $query);

		if (!$inserir) {
			// TODO redirecionar para uma sala de erro padronizada
			echo "Não foi possível inserir a sala, tente novamente.";
			// Exibe dados sobre o erro:
			echo "Dados sobre o erro:" . mysqli_error();
		}		
	}
	
	if(empty($senha)) {
	$erro_senha = "Senha é obrigatória.";
	$erro = true;
	}
}

?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li class="active">TAGs</li>
					</ol>
				</div>
			</div>
		
		<?php if($_SERVER["REQUEST_METHOD"] == "POST"): ?>
		<?php if (!$erro): ?>
		<?php header('location:/gandalf/webapp/tag/cadastrar_tag_action.php'); ?>
		<?php else: ?>
		  <div class="alert alert-danger">
			Erros no formulário: 
			<?php if(($erro) && (!empty($erro_tag))) {echo "<br>Chave: $erro_tag";}?>
			<?php if(($erro) && (!empty($erro_senha))) {echo "<br>Senha: $erro_senha";}?>
		  </div>
		<?php endif; ?>
		<?php endif; ?>

		<form method="POST" id="preencheChave" action="#" onsubmit="return true">
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="txtChave">Chave:</label>
						<input type="number" class="form-control" id="txtChave" name="numTag">
					</div>
					<div class="form-group col-xs-3">
						<label for="txtTipo">Tipo:</label>
						<br>
						<select class="form-control" id="selTAGtipo" name="optTipoTag">
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
						<div class="form-group col-xs-4">
						<label for="txtSenha">Senha:</label>
						<input type="password" class="form-control" id="txtSenha" name="txtSenha" required>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-xs-12">
						<button type="submit" class="btn btn-default" onclick="valida_form(this)">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Incluir
						</button>
						<!-- TODO ver o que fazer com esse botão
						<button type="submit" class="btn btn-default" formaction="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/tag/cadastrar_tag.php" formnovalidate>
							<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Cancelar
						</button>
						-->
					</div>
				</div>
			</form>
			
			<form action="editar_tag.php" id="selTAGform" method="POST" onsubmit="return true">
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="selTAG">Chave:</label>
						<select class="form-control" id="selTAG" name="optChave">
							<option value="" selected>selecione </option>
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
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
						</button>
						<button type="submit" class="btn btn-default" onclick="valida()" formaction="excluir_tag.php">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir
						</button>
					</div>
				</div>
			</form>
		</div>
<?php	
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>


