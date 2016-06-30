<?php  
	session_start();
	if((!isset ($_SESSION['login']) == true)) {
		header('location:/gandalf/webapp/login/login.php');
	}

	$logado = $_SESSION['nomeUsuario'];
	$categoria = $_SESSION['categoria'];
	$idUsuario = $_SESSION['idUsuario'];
	$idTag = $_SESSION['idTag'];
?>
<html>
<head>
	<title>Sistema de Controle de Acesso</title>
	<link rel="stylesheet" href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/resources/bootstrap/css/bootstrap-darkly.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf8">
	<script src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/resources/jquery/js/jquery.js" type="text/javascript"></script>
	<script src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/resources/jquery/js/jquery.maskedinput-1.3.js" type="text/javascript"></script>
	<script src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/resources/jquery/js/mascaras.js" type="text/javascript"></script>
	<script src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/resources/jquery/js/preenche_endereco.js" type="text/javascript"></script>
	<script src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/resources/jquery/js/valida_cpf_cnpj.js" type="text/javascript"></script>
	<script src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/resources/jquery/js/validacpf.js" type="text/javascript"></script>
	<script src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/resources/jquery/js/confere_checkbox.js" type="text/javascript"></script>
	<script src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/resources/jquery/js/confere_checkbox_exclusao.js" type="text/javascript"></script>
	<script src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/resources/jquery/js/confere_select_tag.js" type="text/javascript"></script>
	<script src="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/resources/jquery/js/confere_input_chave.js" type="text/javascript"></script>	
</head>
<body>

	<div class="container">
		<div class="page-header">
			<div class="row">
				<div class="col-xs-8 text-left">
					<h1 >Sistema de Controle de Acesso</h1>
				</div>
				<div class="col-xs-4 text-right">
					<h5>Bem-vindo, <?=$logado?>!</h5>
					<h5><a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/login/logout.php">Sair</a></h5>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	
	<div class="container">