<div class="col-xs-2">
	<ul class="nav nav-pills nav-stacked">
		<li role="presentation" class="<?php if ($current_page == "index") { echo 'active'; }?>">
			<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/">Início</a>
		</li>

		<!-- TODO exibir a opção correspondente ao tipo de usuário logado -->
		<!-- Opção Usuários que leva para a tela de pesquisa -->
		<li role="presentation" class="<?php if ($current_page == "usuario") { echo 'active'; }?>">
			<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/usuario/pesquisar_usuario.php">Usuário</a>
		</li>
		<!-- Opção Usuários que leva para a tela de inclusão
		<li role="presentation" class="<?php if ($current_page == "usuario") { echo 'active'; }?>">
			<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/usuario/cadastrar_usuario.php">Usuário</a>
		</li>
		 -->

		<li role="presentation" class="<?php if ($current_page == "tag") { echo 'active'; }?>">
			<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/tag/cadastrar_tag.php">TAG</a>
		</li>

		<!-- Associar TAG -->

		<li role="presentation" class="<?php if ($current_page == "historicotag") { echo 'active'; }?>">
			<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/tag/pesquisar_tag.php">Histórico</a>
		</li>

		<!-- Controle de Acesso -->

		<li role="presentation" class="<?php if ($current_page == "sala") { echo 'active'; }?>">
			<a href="<?php $_SERVER["DOCUMENT_ROOT"] ?>/gandalf/webapp/sala/pesquisar.php">Sala</a>
		</li>
	</ul>
</div>
