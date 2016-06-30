<?php

$current_page = "usuario";
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";

// abre a conexão
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

// for que irá capturar o array de usuarios e excluir uma a uma
$arr = $_POST['listaUsuarios'];
	foreach ($arr as $idUsuario) {

	// evitar sql inject
	$idUsuario = mysqli_real_escape_string($link, $idUsuario);

	// montagem da query
	$query = "DELETE FROM usuario 
			WHERE id = $idUsuario";
			
	// Executa a query
	$inserir = mysqli_query($link, $query);

	}

if (!$inserir) {
	// TODO redirecionar para uma sala de erro padronizada
	echo "Não foi excluir o(s) usuário(s), tente novamente.";
	// Exibe dados sobre o erro:
	echo "Dados sobre o erro:" . mysqli_error($link);
}

?>

	<div class="col-xs-10">
		<div class="row">
			<div class="col-xs-12">
					<ol class="breadcrumb">
						<li>
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/usuario/pesquisar_usuario.php">Usuários</a>
						</li>
						<li class="active">
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/usuario/cadastrar_usuario.php">Excluir</a>
						</li>
						<li class="active">Sucesso</li>
					</ol>
				</div>
			</div>
		
			<div class="row">
				<div class="col-xs-12">
					<div class="alert alert-success" role="alert">
						Usuário(s) excluído(s) com sucesso.
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
					<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/usuario/pesquisar_usuario.php">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pesquisar usuários
					</a>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/usuario/cadastrar_usuario.php">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Incluir um novo usuário
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