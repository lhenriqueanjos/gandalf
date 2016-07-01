<?php

// abre a conexão
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

// variáveis para insert
$domingo = isset($_POST['chkDom']) ? 1 : 0;
$segunda = isset($_POST['chkSeg']) ? 1 : 0;
$terca = isset($_POST['chkTer']) ? 1 : 0;
$quarta = isset($_POST['chkQua']) ? 1 : 0;
$quinta = isset($_POST['chkQui']) ? 1 : 0;
$sexta = isset($_POST['chkSex']) ? 1 : 0;
$sabado = isset($_POST['chkSab']) ? 1 : 0;

$idSala = $_POST['selectSala'];
$idTag = $_POST['idTag'];

$horaInicio = $_POST['txtHoraInicio'];
$horaFim = $_POST['txtHoraFim'];
$dataInicio = $_POST['txtDataInicio'];
$dataFim = $_POST['txtDataFim'];

$idSala = mysqli_real_escape_string($link, $idSala);
$idTag = mysqli_real_escape_string($link, $idTag);

$horaInicio = mysqli_real_escape_string($link, $horaInicio);
$horaFim = mysqli_real_escape_string($link, $horaFim);
$dataInicio = mysqli_real_escape_string($link, $dataInicio);
$dataFim = mysqli_real_escape_string($link, $dataFim);

$horaInicio = date("H:i:s", strtotime($horaInicio));
$horaFim = date("H:i:s", strtotime($horaFim));
$dataInicio = date("Y-m-d", strtotime($dataInicio));
if (empty($dataFim)) {
	$dataFim = "null";
} else {
	$dataFim = "'".date("Y-m-d", strtotime($dataFim))."'";
}

// montagem da query
$query = "INSERT INTO permissao (id_tag, id_sala, hora_inicio, hora_fim, data_inicio_permissao, data_fim_permissao, 
	domingo, segunda, terca, quarta, quinta, sexta, sabado) 
	VALUES ($idTag, $idSala, '$horaInicio', '$horaFim', '$dataInicio', $dataFim, 
	$domingo, $segunda, $terca, $quarta, $quinta, $sexta, $sabado)";

// Executa a query
$inserir = mysqli_query($link, $query);

if (!$inserir) {
	// TODO redirecionar para uma sala de erro padronizada
	echo "Não foi possível inserir a permissão, tente novamente.";
	// Exibe dados sobre o erro:
	echo "Dados sobre o erro:" . mysqli_error();
}

$current_page = "controleacesso";
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";

?>

	<div class="col-xs-10">
		<div class="row">
			<div class="col-xs-12">
				<ol class="breadcrumb">
					<li>
						<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/controle/controle_acesso.php">Controle de Acesso</a>
					</li>
					<li class="active">
						<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/controle/cadastrar_controle_acesso.php">Incluir regra de acesso</a>
					</li>
					<li class="active">Sucesso</li>
				</ol>
				</div>
			</div>
		
			<div class="row">
				<div class="col-xs-12">
					<div class="alert alert-success" role="alert">
						<span class="glyphicon glyphicon-ok"></span> Regra de acesso incluída com sucesso.
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