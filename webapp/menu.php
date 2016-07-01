<div class="col-xs-2">
	<ul class="nav nav-pills nav-stacked">
		

		<li role="presentation" class="<?php if ($current_page == "index") { echo 'active'; } ?>">
			<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/">Início</a>
		</li>

		<?php if ($categoria == 'ADMINISTRADOR') { ?>
			<!-- Opção Usuários que leva para a tela de pesquisa -->
			<li role="presentation" class="<?php if ($current_page == "usuario") { echo 'active'; } ?>">
				<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/usuario/pesquisar_usuario.php">Usuário</a>
			</li>
		<?php } ?>
		
		<?php if ($categoria == 'CLIENTE') { ?>
			<!-- Opção Usuários que leva para a tela de inclusão -->
			<li role="presentation" class="<?php if ($current_page == "usuario") { echo 'active'; } ?>">
				<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/usuario/cadastrar_usuario.php">Usuário</a>
			</li>
		<?php } ?>

		<?php if ($categoria == 'ADMINISTRADOR' || $categoria == 'MASTER') { ?>
			<li role="presentation" class="<?php if ($current_page == "tag") { echo 'active'; } ?>">
				<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/tag/cadastrar_tag.php">TAG</a>
			</li>
		<?php } ?>

		<?php if ($categoria == 'ADMINISTRADOR') { ?>
			<li role="presentation" class="<?php if ($current_page == "associartag") { echo 'active'; } ?>">
				<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/associar_tag/pesquisa.php">Associar TAG</a>
			</li>
		<?php } ?>

		<?php if ($categoria == 'ADMINISTRADOR' || $categoria == 'CLIENTE') { ?>
			<li role="presentation" class="<?php if ($current_page == "historicotag") { echo 'active'; } ?>">
				<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/tag/pesquisar_tag.php">Histórico</a>
			</li>
		<?php } ?>

		<?php if ($categoria == 'ADMINISTRADOR') { ?>
			<!-- Controle de Acesso -->
			<li role="presentation" class="<?php if ($current_page == "controleacesso") { echo 'active'; } ?>">
				<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/controle/controle_acesso.php">Controle de Acesso</a>
			</li>
		<?php } ?>

		<?php if ($categoria == 'ADMINISTRADOR') { ?>
			<li role="presentation" class="<?php if ($current_page == "sala") { echo 'active'; } ?>">
				<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/sala/pesquisar.php">Sala</a>
			</li>
		<?php } ?>
	</ul>
</div>
