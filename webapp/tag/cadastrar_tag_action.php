<?php

// abre a conexão
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

// var_dump($_POST);

// variáveis para insert
$idCategoria = $_POST['optTipoTag'];
$numeroTag = $_POST['numTag'];
$senha = $_POST['txtSenha'];

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

$current_page = "tag";
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";

?>

	<div class="col-xs-10">
		<div class="row">
			<div class="col-xs-12">
				<ol class="breadcrumb">
					<li>
						<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/tag/cadastrar_tag.php">TAG</a>
					</li>
					<li>
						<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/tag/cadastrar_tag.php">Incluir</a>
					</li>
					<li class="active">Sucesso</li>
				</ol>
				</div>
			</div>
		
			<div class="row">
				<div class="col-xs-12">
					<div class="alert alert-success" role="alert">
						TAG incluída com sucesso.
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