<?php

// abre a conexão
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

// var_dump($_POST);

// variáveis para insert
$nomeUsuario = $_POST['txtNome'];
$matriculaUsuario = $_POST['txtMatricula'];
$ruaUsuario = $_POST['txtRua'];
$numeroUsuario = $_POST['txtNumero'];
$bairroUsuario = $_POST['txtBairro'];
$cepUsuario = $_POST['txtCEP'];
$cidadeUsuario = $_POST['txtCidade'];
$estadoUsuario = $_POST['txtEstado'];
$emailUsuario = $_POST['txtEmail'];
$telefoneUsuario = $_POST['txtTelefone'];
$deptoUsuario = $_POST['txtDepto'];
$fotoUsuario = $_POST['txtFoto'];

// evitar sql inject
$nomeUsuario = mysql_escape_string($nomeUsuario);
$matriculaUsuario = mysql_escape_string($matriculaUsuario);
$ruaUsuario = mysql_escape_string($ruaUsuario);
$numeroUsuario = mysql_escape_string($numeroUsuario);
$bairroUsuario = mysql_escape_string($bairroUsuario);
$cepUsuario = mysql_escape_string($cepUsuario);
$cidadeUsuario = mysql_escape_string($cidadeUsuario);
$estadoUsuario = mysql_escape_string($estadoUsuario);
$emailUsuario = mysql_escape_string($emailUsuario);
$telefoneUsuario = mysql_escape_string($telefoneUsuario);
$deptoUsuario = mysql_escape_string($deptoUsuario);
$fotoUsuario = mysql_escape_string($fotoUsuario);

// montagem da query
$query = "INSERT INTO usuario (matricula, nome, departamento, rua, numero, bairro, cep, cidade, estado, telefone, email, foto) 
VALUES (".$matriculaUsuario.", '".$nomeUsuario."', '".$deptoUsuario."', '".$ruaUsuario."', ".$numeroUsuario.", '".$bairroUsuario."', 
'".$cepUsuario."', '".$cidadeUsuario."', '".$estadoUsuario."', '".$telefoneUsuario."', '".$emailUsuario."', '".$fotoUsuario."')";

// Executa a query
$inserir = mysql_query($query);

if (!$inserir) {
	// TODO redirecionar para uma sala de erro padronizada
	echo "Não foi possível inserir o usuário, tente novamente.";
	// Exibe dados sobre o erro:
	echo "Dados sobre o erro:" . mysql_error();
}

$current_page = "usuario";
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";

?>

	<div class="col-xs-10">
		<div class="row">
			<div class="col-xs-12">
					<ol class="breadcrumb">
						<li>
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/usuario/pesquisar_usuario.php">Usuários</a>
						</li>
						<li class="active">
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/usuario/cadastrar_usuario.php">Incluir</a>
						</li>
						<li class="active">Sucesso</li>
					</ol>
				</div>
			</div>
		
			<div class="row">
				<div class="col-xs-12">
					<div class="alert alert-success" role="alert">
						Usuário cadastrado com sucesso.
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