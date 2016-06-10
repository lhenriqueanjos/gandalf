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
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Últimos 5 acessos</h3>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover">
						<thead>
							<th>Acesso</th>
							<th>Local</th>
						</thead>
						<tbody>
						<?php require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/index_historico.php";  ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
  
<?php  
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>