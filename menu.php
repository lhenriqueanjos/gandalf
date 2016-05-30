<div class="col-xs-2">
	<ul class="nav nav-pills nav-stacked">
		<li role="presentation" class="<?php if ($current_page == "index") { echo 'active'; }?>">
			<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/">Início</a>
		</li>
		<li role="presentation" class="<?php if ($current_page == "usuario") { echo 'active'; }?>">
			<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/usuario/pesquisar_usuario.php">Usuários</a>
		</li>
		<li role="presentation" class="<?php if ($current_page == "sala") { echo 'active'; }?>">
			<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/sala/pesquisar.php">Salas</a>
		</li>
		<li role="presentation" class="<?php if ($current_page == "tag") { echo 'active'; }?>">
			<a href="#">TAGs</a>
		</li>
		<li role="presentation" class="<?php if ($current_page == "historicotag") { echo 'active'; }?>">
			<a href="#">Histórico de TAGs</a>
		</li>
	</ul>
</div>