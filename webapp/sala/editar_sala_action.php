<?php

$current_page = "sala";
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";

// abre a conexão
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

// var_dump($_POST);

// variáveis para insert
$auxiliar = $_POST['txtID'];
$nomeSala = $_POST['txtNome'];
$numeroSala = $_POST['txtNumero'];
$descricaoSala = $_POST['txtDescricao'];

// evitar sql inject
$nomeSala = mysqli_real_escape_string($link, $nomeSala);
$numeroSala = mysqli_real_escape_string($link, $numeroSala);
$descricaoSala = mysqli_real_escape_string($link, $descricaoSala);

// montagem da query
$query = "UPDATE sala 
		SET numero = $numeroSala, 
			nome = '$nomeSala',
			descricao = '$descricaoSala'
		WHERE id = $auxiliar";

// Executa a query
$inserir = mysqli_query($link, $query);

if (!$inserir) {
	// TODO redirecionar para uma sala de erro padronizada
	echo "Não foi possível alterar a sala, tente novamente.";
	// Exibe dados sobre o erro:
	echo "Dados sobre o erro:" . mysqli_error($link);
}

?>

	<div class="col-xs-10">
		<div class="row">
			<div class="col-xs-12">
				<ol class="breadcrumb">
					<li>
						<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/sala/pesquisar.php">Sala</a>
					</li>
					<li>
						<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/sala/pesquisar.php">Editar</a>
					</li>
					<li class="active">Sucesso</li>
				</ol>
				</div>
			</div>
		
			<div class="row">
				<div class="col-xs-12">
					<div class="alert alert-success" role="alert">
						Sala alterada com sucesso.
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
					<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/sala/pesquisar.php">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Pesquisar uma sala
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