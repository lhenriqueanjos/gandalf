<?php
	$current_page = "index";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/header.php";
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/menu.php";
	
	// abre a conexão
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

	// carregar os dados do usuário
	// montagem da query
	$query = "SELECT * FROM usuario WHERE id = $idUsuario AND status = 1";
			
	// Executa a query
	$result = mysqli_query($link, $query);			
	$row = mysqli_fetch_assoc($result); 

	if (isset($row['foto'])){
		$caminhoFoto = "fotos/".$row['foto'];
	}else{
		$caminhoFoto = NULL;
	}
	
	function Mask($mask,$str){

    $str = str_replace(" ","",$str);

    for($i=0;$i<strlen($str);$i++){
        $mask[strpos($mask,"#")] = $str[$i];
    }

    return $mask;
}

?>

		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li class="active">Início</li>
					</ol>
				</div>
			</div>
			<?php if (isset($idUsuario)){ ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Informações do usuário</h3>
				</div>
				<div class="panel-body">
					Nome: <?= $row['nome'] ?>
					<br>Matricula: <?= $row['matricula'] ?>
					<br>Departamento: <?= $row['departamento'] ?>
					<br>Endereço: <?= $row['rua'] ?>, <?= $row['numero'] ?>, <?= $row['bairro'] ?> - <?= $row['cidade'] ?>-<?= $row['estado'] ?>
					<?php	
						$cep = $row['cep'];
						echo ' - '.Mask("##.###-###", $cep); 
					?>
					<br>Contato: 
					<?php	
						$fone = $row['telefone'];
						echo ' - '.Mask("(##) ####-####",$fone).' / '; 
					?>
					<?= $row['email'] ?>
					<?php	
						$cpf = $row['cpf'];
						echo '<BR>Documento: '.Mask("###.###.###-##",$cpf); 
					?>
				
				</div>
			</div>
			<?php }else{ ?>
			<div class="panel-heading">
				<h3 class="panel-title">Não há um usuário associado a esta Tag.</h3>
			</div>
			<?php } ?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Últimos acessos</h3>
				</div>
				<div class="panel-body">
					<?php include $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/index_historico.php";  ?>
				</div>
			</div>
		</div>
  
<?php  
	require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/footer.php";
?>