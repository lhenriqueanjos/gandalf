<?php

require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

$sql = "SELECT DATE_FORMAT(data_hora, '%d/%m/%Y %H:%i:%s') as data_hora, acesso.id_sala, acesso.id
		FROM rel_usuario_tag
		JOIN acesso
		ON acesso.id_tag = rel_usuario_tag.id_tag
		WHERE rel_usuario_tag.id_tag = $idUsuario
		ORDER BY data_hora DESC";

$result = mysqli_query($link, $sql);

$count = 0;

$totalHist = mysqli_num_rows($result);
if ($totalHist > 0) {
    while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		$queryCategoria = "SELECT nome FROM sala WHERE id = ".$row['id_sala']." ";
		$resultado2 = mysqli_query($link, $queryCategoria) or die(mysqli_error($link));
		$linha = mysqli_fetch_assoc($resultado2);
		echo "<td>" .$row["data_hora"]. "</td><td>" .$linha["nome"]. "</td>";
		echo "</tr>";
    }
}
?>
