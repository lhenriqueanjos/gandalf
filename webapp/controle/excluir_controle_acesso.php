<?php

$current_page = "controleacesso";
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";

// abre a conexão
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

// for que irá capturar o array de salas e excluir uma a uma
$arr = $_POST['listaPermissoes'];
foreach ($arr as $idPermissao) {

// evitar sql inject
$idPermissao = mysqli_real_escape_string($link, $idPermissao);

// montagem da query
$query = "DELETE FROM permissao 
		WHERE id = $idPermissao";
		
// Executa a query
$excluiu = mysqli_query($link, $query);

}

if (!$excluiu) {
	// TODO redirecionar para uma sala de erro padronizada
	echo "Não foi possível excluir a permissão, tente novamente.";
	// Exibe dados sobre o erro:
	echo "Dados sobre o erro:" . mysqli_error($link);
}

?>

	<div class="col-xs-10">
		<div class="row">
			<div class="col-xs-12">
				<ol class="breadcrumb">
					<li>
						<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/controle/controle_acesso.php">Controle de Acesso</a>
					</li>
					<li class="active">
						<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/controle/cadastrar_controle_acesso.php">Excluir regra de acesso</a>
					</li>
					<li class="active">Sucesso</li>
				</ol>
				</div>
			</div>
		
			<div class="row">
				<div class="col-xs-12">
					<div class="alert alert-success" role="alert">
						<span class="glyphicon glyphicon-ok"></span> Regra de acesso excluída com sucesso.
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
					<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/controle/controle_acesso.php">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Ir para Controle de Acesso
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