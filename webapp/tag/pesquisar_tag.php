<?php
	$current_page = "historicotag";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";
	
	$totalHist = 0;
	// abrir conexão
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

	// query para carregar a tabela de tags
	$sql = "SELECT id, codigo FROM tag"; // TODO -> associar ao usuário logado, para puxar o histórico correto
	$result = mysqli_query($link, $sql);
	$total = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result); 

	// query para carregar a id da tag do usuario logado
	$sql1 = "SELECT id_tag FROM rel_usuario_tag WHERE id_usuario = $idUsuario";
	$result1 = mysqli_query($link, $sql1);
	$total1 = mysqli_num_rows($result1);
	if($total1 > 0){
		$row1 = mysqli_fetch_assoc($result1);
	}else{
		$row1 = NULL;
	}

	// query para carregar os dados do usuario logado
	$sql2 = "SELECT nome FROM usuario WHERE id = $idUsuario and status = 1";
	$result2 = mysqli_query($link, $sql2);
	$total2 = mysqli_num_rows($result2);
	if($total2 > 0){
		$row2 = mysqli_fetch_assoc($result2);
	}else{
		$row2 = NULL;
	}
	
	// query para carregar tipo da tag do usuario logado
	$sqlForm1 = "SELECT categoria_usuario.tipo
				FROM rel_usuario_tag
				JOIN usuario
				ON rel_usuario_tag.id_usuario = usuario.id
				JOIN categoria_usuario
				ON categoria_usuario.id = usuario.id_categoria
				WHERE rel_usuario_tag.id_usuario = $idUsuario";
	$resultForm1 = mysqli_query($link, $sqlForm1);		
	$rowForm1 = mysqli_fetch_assoc($resultForm1);

	$var1 = NULL;
	$var2 = NULL;
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
						<select class="form-control" id="selTAG" name="opt" <?php if($categoria != "ADMINISTRADOR"){ echo "disabled";} ?>>
							<option value="">selecione </option> <!- Quando o login tiver implementado, fazer o value receber o id do usuario logado? ->
							<?php
								do {
							?>
							<option value="<?=$row['id']?>" <?php if($categoria != "ADMINISTRADOR"){if(isset($row1['id_tag'])){if($row['id'] == $row1['id_tag']){ echo "selected";}}} ?>><?=$row['codigo']?></option>
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
						<?php if($categoria == "ADMINISTRADOR"){ ?>
						<button type="submit" class="btn btn-default" onclick="valida()">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Selecionar
						</button>
						<?php } ?>
					</div>
				</div>
			</form>
			
			<form>
				<div class="row">
					<div class="form-group col-xs-5">
						<label for="txtNomeAp">Nome:</label>
						<input type="text" class="form-control" id="txtNomeAp" value="<?php if(($categoria != "ADMINISTRADOR") && (isset($row1['id']))){ echo $row2['nome'];}else{ echo $var1;} ?>" disabled> 
					</div>
					<div class="form-group col-xs-3">
						<label for="txtTipoAp">Tipo:</label>
						<input type="text" class="form-control" id="txtTipoAp" value="<?php if(($categoria != "ADMINISTRADOR") && (isset($row1['id']))){ echo $rowForm1['tipo'];}else{ echo $var2;} ?>" disabled>
					</div>
				</div>
			</form>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Histórico de acessos</h3>
				</div>
				<div class="panel-body">
					<?php 
						// se o usuário tiver feito a pesquisa, exibe a tabela
						if(isset($_POST) and $var1 != NULL) {
					?>
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<th>Acesso</th>
							<th>Local</th>
						</thead>
						<tbody>
							<?php include $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/tag/pesquisar_tag_historico.php"; ?>
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
		</div>
<?php	
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>

