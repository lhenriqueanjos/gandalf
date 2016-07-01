<?php
	$current_page = "associartag";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";
	
	$idUser = $_POST['txtID'];
	$idTagUser = $_POST['opt'];
	$erro = false;
	
	// abrir conexão
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

	$query = "INSERT INTO rel_usuario_tag (id_usuario, id_tag) VALUES ($idUser, $idTagUser)";

	// Executa a query
	$inserir = mysqli_query($link, $query);

	if (!$inserir) {
		$erro = true;

	}
?>

	<div class="col-xs-10">
		<div class="row">
			<div class="col-xs-12">
				<ol class="breadcrumb">
					<li>
						<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/associar_tag/pesquisa.php">TAG</a>
					</li>
					<li>
						<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/associar_tag/pesquisa.php">Associar</a>
					</li>
					<li class="active"><?php if(!$erro){ echo "Sucesso";}else{"Erro!";}?></li>
				</ol>
				</div>
			</div>
		
			<div class="row">
				<div class="col-xs-12">
					<?php if(!$erro){ ?>
					<div class="alert alert-success" role="alert">
						TAG associada com sucesso.
					</div>
					<?php } else { ?>
					<div class="alert alert-danger" role="alert">
						Erro ao tentar associar. Tente novamente.
					</div>
					<?php } ?>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<p>O que deseja fazer?</p>	
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/associar_tag/pesquisa.php">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Associar outra TAG
					</a>
				</div>
			</div>


			<div class="row">
				<div class="col-xs-12">
					<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/">
						<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Voltar para o início
					</a>
				</div>
			</div>

		</div>
	</div>

<?php	

require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";

?>