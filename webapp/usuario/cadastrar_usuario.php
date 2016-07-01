<?php

$current_page = "usuario";
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";

if (!isset($_POST["txtHidden"])) {
	unset($_POST);
}

function verifica_campo($texto) {

  $texto = trim($texto);
  $texto = stripslashes($texto);
  $texto = htmlspecialchars($texto);
  return $texto;
}

function validarCPF( $cpf = '' ) {

	$cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
	// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
	if ( strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
		return true;
	} else { // Calcula os números para verificar se o CPF é verdadeiro
		for ($t = 9; $t < 11; $t++) {
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{$c} != $d) {
				return true;
			}
		}
		return false;
	}
}

$nome = $tipo = $matricula = $cep = $rua = $numero = $bairro = $cidade = $estado = $email = $departamento = $telefone = $foto = $senha = NULL;
$nome_imagem = NULL;
$erro = false;
$varX = 0;

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST)) {
	
	$varX = 1;

	if(!empty($_POST["txtTipo"])) {
		$tipo = $_POST['txtTipo'];
	}
	
  if(empty($_POST["txtNome"])) {
    $erro_nome = "Nome é obrigatório.";
    $erro = true;
  } else{

	if (!preg_match("/^[a-zA-Z ]*$/",$_POST["txtNome"])) {
		$erro = true;
		$erro_nome = "Apenas letras e espaços são permitidos"; 
	} else {
		$nome = verifica_campo($_POST["txtNome"]);
	}
  }

  if(!empty($_POST["txtMatricula"])) {
	  $matricula = verifica_campo($_POST["txtMatricula"]);
  } else {
	  $matricula = NULL;
  }

  if(!empty($_POST["txtRua"])) {
	$rua = verifica_campo($_POST["txtRua"]);
  } else {
	  $rua = NULL;
  }

  if(!empty($_POST["txtNumero"])) {
	$numero = verifica_campo($_POST["txtNumero"]);
  } else {
	  $numero = NULL;
  }

  if(!empty($_POST["txtBairro"])) {
	$bairro = verifica_campo($_POST["txtBairro"]);
  } else {
	  $bairro = NULL;
  }

  if(!empty($_POST["txtCEP"])) {
	$cep = verifica_campo($_POST["txtCEP"]);
	$cep = str_replace(".", "", $cep);
	$cep = str_replace("-", "", $cep);

  } else {
	  $cep = NULL;
  }

  if(!empty($_POST["txtCidade"])) {
	$cidade = verifica_campo($_POST["txtCidade"]);
  } else {
	  $cidade = NULL;
  }

  if(!empty($_POST["txtEstado"])) {
	$estado = verifica_campo($_POST["txtEstado"]);
  } else {
	  $estado = NULL;
  }

  if(empty($_POST["txtEmail"])) {
    $erro_email = "Email é obrigatório.";
    $erro = true;
  } else{
	  
	if (!filter_var($_POST["txtEmail"], FILTER_VALIDATE_EMAIL)) {
	    $erro = true;
		$erro_email = "Formato de email inválido"; 
	} else{
		$email = verifica_campo($_POST["txtEmail"]);
		
		require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";
		
		// montagem da query
		$query = "SELECT email
				FROM usuario
				WHERE email = '$email'";

		// Executa a query
		$resultado = mysqli_query($link, $query);
		$total = mysqli_num_rows($resultado);
		
		if ($total > 0){
			$erro = true;
			$erro_email = "E-mail já cadastrado";
		}else{
			
			$erro_email = false;
		}
			
		}
  }

  if(!empty($_POST["txtTelefone"])) {
	$telefone = verifica_campo($_POST["txtTelefone"]);
	$telefone = str_replace("(", "", $telefone);
	$telefone = str_replace(")", "", $telefone);
	$telefone = str_replace("-", "", $telefone);
	$telefone = str_replace(" ", "", $telefone);
  } else {
	  $telefone = NULL;
  }

  if(empty($_POST["txtCPF"])) {
    $erro_cpf = "CPF é obrigatório.";
    $erro = true;
  }
  else{
	$cpf = verifica_campo($_POST["txtCPF"]);
	$cpf = str_replace(".", "", $cpf);
	$cpf = str_replace("-", "", $cpf);
		
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";
	
	// montagem da query
	$query = "SELECT cpf
			FROM usuario
			WHERE cpf = $cpf 
			and status = 1";

	// Executa a query
	$resultado = mysqli_query($link, $query);
	$total = mysqli_num_rows($resultado);
	
	if ($total > 0){
		$erro = true;
		$erro_cpf = "CPF já cadastrado";
	}else{
		
		$erro_cpf = false;
	}

	//$erro_cpf = validaCPF($cpf);
	//if($erro_cpf) {
	//	$erro_cpf = "CPF invalido";
	//}
  }
  
  if(!empty($_POST["txtDepto"])) {
	$departamento = verifica_campo($_POST["txtDepto"]);
  } else {
	  $departamento = NULL;
  }
  
  if(empty($_POST["txtSenha"])) {
    $erro_senha = "Senha é obrigatória.";
    $erro = true;
  }else{
	  $senha = $_POST["txtSenha"];
  }

// Se a foto estiver sido selecionada
if (isset($_FILES["txtFoto"])) {
	$foto = $_FILES["txtFoto"];
}

if ((!empty($foto["name"])) && !$erro) {
	
	// Tamanho máximo do arquivo em bytes
	$tamanho = 20000000; // 20MB

	// Verifica se o arquivo é uma imagem
	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) {
	   $error[1] = "Isso não é uma imagem.";
	   $erro = true;
	} 
		
	// Verifica se o tamanho da imagem é maior que o tamanho permitido
	if($foto["size"] > $tamanho) {
		$error[2] = "A imagem deve ter no máximo ".$tamanho." bytes";
		error_log("A imagem deve ter no máximo ".$tamanho." bytes");
		$erro = true;
	}

	// Pega extensão da imagem
	$fotoInfo = new SplFileInfo($foto["name"]);
	$ext = $fotoInfo->getExtension();

	// Gera um nome único para a imagem
	$nome_imagem = md5(uniqid(time())) . "." . $ext;

	$pastaFotos = "fotos";

	if (!file_exists($pastaFotos)) {
	     $oldmask = umask(0);  // helpful when used in linux server  
	     mkdir($pastaFotos, 0744, true);
	}

	// Caminho de onde ficará a imagem
	$caminho_imagem = $pastaFotos."/" . $nome_imagem;

	// Faz o upload da imagem para seu respectivo caminho
	$moveu = move_uploaded_file($foto["tmp_name"], $caminho_imagem);

	if (!$moveu) {
		error_log("Nao moveu a imagem de ".$foto["tmp_name"]." para ". $caminho_imagem);
	}
}

  if (!$erro) {
	  
	// abre a conexão
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

	// evitar sql inject
	$nome = mysqli_real_escape_string($link, $nome);
	$matricula = mysqli_real_escape_string($link, $matricula);
	$matricula = (empty($matricula)) ? "null" : $matricula;
	$rua = mysqli_real_escape_string($link, $rua);
	$numero = mysqli_real_escape_string($link, $numero);
	$numero = (empty($numero)) ? "null" : $numero;
	$bairro = mysqli_real_escape_string($link, $bairro);
	$cep = mysqli_real_escape_string($link, $cep);
	$cidade = mysqli_real_escape_string($link, $cidade);
	$estado = mysqli_real_escape_string($link, $estado);
	$email = mysqli_real_escape_string($link, $email);
	$telefone = mysqli_real_escape_string($link, $telefone);
	$cpf = mysqli_real_escape_string($link, $cpf);
	$departamento = mysqli_real_escape_string($link, $departamento);
	$senha = mysqli_real_escape_string($link, $senha);
	$tipo = mysqli_real_escape_string($link, $tipo);
	$tipo = (empty($tipo)) ? '2' : $tipo;

	// montagem da query
	$query = "INSERT INTO usuario (id_categoria, matricula, nome, departamento, rua, numero, bairro, cep, cidade, estado, telefone, cpf, email, foto, senha) VALUES (".$tipo.", ".$matricula.", '".$nome."', '".$departamento."', '".$rua."', ".$numero.", '".$bairro."', '".$cep."', '".$cidade."', '".$estado."', '".$telefone."', '".$cpf."', '".$email."', '".$nome_imagem."', MD5('".$senha."'))";

	// Executa a query
	$inserir = mysqli_query($link, $query);

	if (!$inserir) {
		// TODO redirecionar para uma sala de erro padronizada
		error_log("Não foi possível inserir o usuário, tente novamente.");
		// Exibe dados sobre o erro:
		error_log("Dados sobre o erro:" . mysqli_error($link));

	  }
  }
 }
?>
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li>
							<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/usuario/pesquisar_usuario.php">Usuários</a>
						</li>
						<li class="active">Incluir</li>
					</ol>
				</div>
			</div>

			  <?php if(isset($_SERVER) && $varX == 1) ://($_SERVER["REQUEST_METHOD"] == "POST"): ?>
				<?php if (!$erro): ?>
				<?php header('location:/gandalf/webapp/usuario/cadastrar_usuario_action.php'); ?>
				<?php else: ?>
				  <div class="alert alert-danger">
					Erros no formulário: 
					<?php if(($erro) && (!empty($erro_nome))) {echo "<br>Nome: $erro_nome";}?>
					<?php if(($erro) && (!empty($erro_email))) {echo "<br>E-mail: $erro_email";}?>
					<?php if(($erro) && (!empty($erro_senha))) {echo "<br>Senha: $erro_senha";}?>
					<?php if(($erro) && (!empty($erro_cpf))) {echo "<br>CPF: $erro_cpf";}?>
				  </div>
				<?php endif; ?>
			  <?php endif; ?>

			<form action="#" enctype="multipart/form-data" method="POST">
				<div class="row">
					<div class="form-group col-xs-9">
						<input type="hidden" class="form-control" id="txtHidden" name="txtHidden" required="required" value="1">
					</div>
					<div class="form-group col-xs-9">
						<label for="txtNome">Nome: </label>
						<input type="text" class="form-control" id="txtNome" name="txtNome" required="required" value="<?php echo $nome; ?>">
					</div>
					<div class="form-group col-xs-3">
						<label for="txtMatricula">Matrícula:</label>
						<input type="number" step="0" class="form-control" id="txtMatricula" name="txtMatricula" value="<?php echo $matricula; ?>">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-3">
						<label for="txtCEP">CEP:</label>
						<input type="text" class="form-control" id="cep" value="<?php echo $cep; ?>" name="txtCEP" maxlength="9" onblur="pesquisacep(this.value);" onKeyPress="jQuery();">
					</div>
					<div class="form-group col-xs-9">
						<label for="txtRua">Rua:</label>
						<input type="text" class="form-control" id="rua" name="txtRua" value="<?php echo $rua; ?>">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-3">
						<label for="txtNumero">Número:</label>
						<input type="text" class="form-control" id="txtNumero" name="txtNumero" value="<?php echo $numero; ?>">
					</div>
					<div class="form-group col-xs-5">
						<label for="txtBairro">Bairro:</label>
						<input type="text" class="form-control" id="bairro" name="txtBairro" value="<?php echo $bairro; ?>">
					</div>
					<div class="form-group col-xs-4">
						<label for="txtCidade">Cidade:</label>
						<input type="text" class="form-control" id="cidade" name="txtCidade" value="<?php echo $cidade; ?>">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-2">
						<label for="txtEstado">Estado:</label>
						<input type="text" class="form-control" id="uf" name="txtEstado" value="<?php echo $estado; ?>">
					</div>
					<div class="form-group col-xs-6">
						<label for="txtEmail">E-mail:</label>
						<input type="email" class="form-control" id="txtEmail" name="txtEmail" required="required" value="<?php echo $email; ?>">
					</div>
					<div class="form-group col-xs-4">
						<label for="txtTelefone">Telefone:</label>
						<input type="text" class="form-control" id="telefone" maxlength="18" name="txtTelefone" required="required" onKeyPress="jQuery();" value="<?php echo $telefone; ?>">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-6">
						<label for="txtDepto">Departamento:</label>
						<input type="text" class="form-control" id="txtDepto" name="txtDepto" value="<?php echo $departamento; ?>">
					</div>
					<div class="form-group col-xs-6">
						<label for="txtCPF">CPF:</label>
						<input type="text" class="form-control" id="cpf" name="txtCPF" maxlength="11" onKeyPress="jQuery();" required="required" value="<?= $cpf; ?>">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-3">
						<label for="txtTipo">Tipo:</label>
						<select name="txtTipo" class="form-control" <?= ($categoria != 'ADMINISTRADOR') ? 'disabled' : '' ?> >
							<option value="1">
								Administrador
							</option>
							<option value="2" 
								<?= ($categoria != 'ADMINISTRADOR') ? 'selected' : '' ?> >
								Cliente
							</option>
						</select>
					</div>				
				
					<div class="form-group col-xs-4">
						<label for="txtDepto">Senha:</label>
						<input type="password" class="form-control" id="txtSenha" name="txtSenha" required="required">
					</div>
					<div class="form-group col-xs-5">
						<label for="txtFoto">Foto:</label>
						<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
						<input type="file" class="form-control" id="txtFoto" name="txtFoto">
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-xs-12">
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar
						</button>
						<button type="submit" class="btn btn-default" formaction="pesquisar_usuario.php" formnovalidate>
							<span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Cancelar
						</button>
					</div>
				</div>
			</form>
		</div>
<?php	
	if (isset($_SERVER)) {
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
	}
?>