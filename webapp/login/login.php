<html>
<head>
	<title>Sistema de Controle de Acesso</title>
	<link rel="stylesheet" href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/resources/bootstrap/css/bootstrap.css">
</head>
<body>

	<div class="container">
		<div class="page-header">
			<div class="row">
				<div class="col-xs-12 text-center">
					<h1>Sistema de Controle de Acesso</h1>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	
	<div class="container">
		<div class="col-xs-4">
		</div>
		<div class="col-xs-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Login</h3>
				</div>
				<div class="panel-body">
					<form method="post" action="login_action.php">
						<div class="row">
							<div class="form-group col-xs-12">
								<label for="txtUsuario">Usuário:</label>
								<input type="text" id="txtUsuario" name="txtUsuario" 
									class="form-control" required="required" />
							</div>
						</div>
						<div class="row">
							<div class="form-group col-xs-12">
								<label for="txtSenha">Senha:</label>
								<input type="password" id="txtSenha" name="txtSenha" 
									class="form-control" required="required" />
							</div>
						</div>

						<div class="row">
							<div class="form-group col-xs-12">
								<button type="submit" class="btn btn-default">
									Login
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>	
		<div class="clearfix"></div>
	</div>

	
</body>
</html>