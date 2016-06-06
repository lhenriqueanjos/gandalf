<?php
	$current_page = "index";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";
?>

		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li class="active">Início</li>
					</ol>
				</div>
			</div>
			
			<p>
				Clique em Salas. 
				É possível ver como vai ficar a tela. Ao clicar em incluir, dá pra ver a tela de cadastro. O botão cancelar funciona.
				Está tudo em páginas estáticas, por enquanto.
			</p>
			
			<div class="row">
				<div class="col-xs-10">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th colspan=2>Últimos 5 acessos</td>
							</tr>
						</thead>
						<thead>
							<th>Acesso</th>
							<th>Local</th>
						</thead>
						<tbody>
						<?php require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/index_historico.php"; ?>
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
  
<?php  
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>