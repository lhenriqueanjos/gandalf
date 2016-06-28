<?php
	// session_start inicia a sessão
	session_start();

	unset($_SESSION['login']);
	header('location:/gandalf/webapp/login/login.php');
?>
