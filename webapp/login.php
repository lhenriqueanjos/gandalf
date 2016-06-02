<html>
<head>
	<title>Sistema de Controle de Acesso</title>
	<link rel="stylesheet" href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/resources/bootstrap/css/bootstrap.css">
</head>
<body>

	<div class="container">
		<div class="page-header">
			<div class="row">
				<div class="col-xs-10 text-center">
					<h1>Sistema de Controle de Acesso</h1>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	
	<div class="container">
		<div class="col-xs-10 text-center">
			<div class="login">
				<h1>Login</h1>
				<form method="post" action="index.html"> <!- Arrumar esta parte ->
					<p><input type="text" name="login" value="" placeholder="Número da tag" maxlength=9></p>
					<p><input type="password" name="password" value="" placeholder="senha"></p>
					<p class="submit"><input type="submit" name="commit" value="Login"></p>
				</form>
			</div>
		</div>
			
		<div class="clearfix"></div>
	</div>

	
</body>
</html>