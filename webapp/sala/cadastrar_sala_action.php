<?php

// abre a conexão
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

// var_dump($_POST);

// variáveis para insert
$nomeSala = $_POST['txtNome'];
$numeroSala = $_POST['txtNumero'];
$descricaoSala = $_POST['txtDescricao'];

// evitar sql inject
$nomeSala = mysql_escape_string($nomeSala);
$numeroSala = mysql_escape_string($numeroSala);
$descricaoSala = mysql_escape_string($descricaoSala);

// montagem da query
$query = "INSERT INTO sala (nome, numero, descricao) VALUES ('".$nomeSala."', ".$numeroSala.", '".$descricaoSala."')";

// Executa a query
$inserir = mysql_query($query);

if ($inserir) {
	echo "Sala inserida com sucesso!";
} else {
	// TODO redirecionar para uma sala de erro padronizada
	echo "Não foi possível inserir a sala, tente novamente.";
	// Exibe dados sobre o erro:
	echo "Dados sobre o erro:" . mysql_error();
}

// redirecionar para a tela de pesquisa

?>