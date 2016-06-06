<?php // APENAS COPEI O "CADASTRAR SALA ACTION", AINDA NAO ADEQUEI

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
$nomeUsuario = mysqli_real_escape_string($link, $nomeUsuario);
$matriculaUsuario = mysqli_real_escape_string($link, $matriculaUsuario);
$ruaUsuario = mysqli_real_escape_string($link, $ruaUsuario);
$numeroUsuario = mysqli_real_escape_string($link, $numeroUsuario);
$bairroUsuario = mysqli_real_escape_string($link, $bairroUsuario);
$cepUsuario = mysqli_real_escape_string($link, $cepUsuario);
$cidadeUsuario = mysqli_real_escape_string($link, $cidadeUsuario);
$estadoUsuario = mysqli_real_escape_string($link, $estadoUsuario);
$emailUsuario = mysqli_real_escape_string($link, $emailUsuario);
$telefoneUsuario = mysqli_real_escape_string($link, $telefoneUsuario);
$deptoUsuario = mysqli_real_escape_string($link, $deptoUsuario);
$fotoUsuario = mysqli_real_escape_string($link, $fotoUsuario);

// montagem da query
$query = "INSERT INTO usuario (matricula, nome, departamento, rua, numero, bairro, cep, cidade, estado, telefone, email, foto) 
VALUES (".$matriculaUsuario.", '".$nomeUsuario."', '".$deptoUsuario."', '".$ruaUsuario."', ".$numeroUsuario.", '".$bairroUsuario."', 
'".$cepUsuario."', '".$cidadeUsuario."', '".$estadoUsuario."', '".$telefoneUsuario."', '".$emailUsuario."', '".$fotoUsuario."')";

// Executa a query
$inserir = mysqli_query($link, $query);

if (!$inserir) {
	// TODO redirecionar para uma sala de erro padronizada
	echo "Não foi possível inserir o usuário, tente novamente.";
	// Exibe dados sobre o erro:
	echo "Dados sobre o erro:" . mysqli_error();
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