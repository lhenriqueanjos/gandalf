<?php

$current_page = "tag";
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";

// abre a conexão
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

// var_dump($_POST);

// variáveis para insert
$chave = $_POST['optChave'];

// evitar sql inject
$chave = mysqli_real_escape_string($link, $chave);

// montagem da query
$query = "DELETE FROM tag 
		WHERE id = $chave";

// Executa a query
$inserir = mysqli_query($link, $query);

if (!$inserir) {
	// TODO redirecionar para uma sala de erro padronizada
	echo "Não foi possível alterar a TAG, tente novamente.";
	// Exibe dados sobre o erro:
	echo "Dados sobre o erro:" . mysqli_error($link);
}

?>

	<div class="col-xs-10">
		<div class="row">
			<div class="col-xs-12">
				<ol class="breadcrumb">
					<li>
						<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/tag/cadastrar_tag.php">TAG</a>
					</li>
					<li>
						<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/tag/cadastrar_tag.php">Excluir</a>
					</li>
					<li class="active">Sucesso</li>
				</ol>
				</div>
			</div>
		
			<div class="row">
				<div class="col-xs-12">
					<div class="alert alert-success" role="alert">
						TAG excluída com sucesso.
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<p>O que deseja fazer?</p>	
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/tag/cadastrar_tag.php">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Incluir uma nova TAG
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