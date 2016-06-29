<?php
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['txtUsuario'];
$senha = $_POST['txtSenha'];

// abre a conexão
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

$login = mysqli_real_escape_string($link, $login);
$senha = mysqli_real_escape_string($link, $senha);

// verificar no cadastro de usuários
$query = "SELECT nome, id_categoria FROM usuario WHERE email = '".$login."' AND senha = MD5('".$senha."')";

$resultado = mysqli_query($link, $query) or die(mysqli_error());

$linha = mysqli_fetch_assoc($resultado);

if(mysqli_num_rows($resultado) > 0) {
	$_SESSION['login'] = $login;
	$_SESSION['nomeUsuario'] = $linha['nome'];
	if ($linha['id_categoria'] == 1) {
		$_SESSION['categoria'] = "ADMINISTRADOR";
	} else {
		$_SESSION['categoria'] = "CLIENTE";
	}

	// tira o resultado da busca da memória
	mysqli_free_result($resultado);

	header('location:/gandalf/webapp/');
} else {

	// verificar no cadastro de usuários
	$query = "SELECT id_categoria FROM tag WHERE codigo = '".$login."' AND senha = MD5('".$senha."')";

	$resultado = mysqli_query($link, $query) or die(mysqli_error());

	$linha = mysqli_fetch_assoc($resultado);

	if(mysqli_num_rows($resultado) > 0) {

		$_SESSION['login'] = $login;
		$_SESSION['nomeUsuario'] = "TAG";
		if ($linha['id_categoria'] == 1) {
			$_SESSION['categoria'] = "TAG";
		} else {
			$_SESSION['categoria'] = "MASTER";
		}

		// tira o resultado da busca da memória
		mysqli_free_result($resultado);

		header('location:/gandalf/webapp/');

	} else {
		unset($_SESSION['login']);
		header('location:/gandalf/webapp/login/login.php?naoEncontrado=true');
	}
}
?>
