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

$query = "SELECT * FROM usuario WHERE email = '".$login."' AND senha = MD5('".$senha."')";
echo($query);
// A vriavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
$result = mysqli_query($link, $query);

/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, 
ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, 
se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php 
ou retornara  para a pagina do formulário inicial para que se possa tentar novamente realizar o login */
if(mysqli_num_rows($result) > 0 ) {
	$_SESSION['login'] = $login;
	header('location:/gandalf/webapp/');
} else {
	unset($_SESSION['login']);
	header('location:/gandalf/webapp/login/login.php?naoEncontrado=true');
}

?>
