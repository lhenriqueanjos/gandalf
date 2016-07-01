<?php

require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

$sql = "SELECT DATE_FORMAT(data_hora, '%d/%m/%Y %H:%i:%s') as data_hora, sala.nome as nomeSala, acesso.id 
		FROM rel_usuario_tag 
		JOIN acesso 
		ON acesso.id_tag = rel_usuario_tag.id_tag 
		JOIN sala on sala.id = acesso.id_sala ";

if (isset($idTag)) {
	$sql = $sql . "WHERE rel_usuario_tag.id_tag = $idTag ";
} else {
	$sql = $sql . "WHERE rel_usuario_tag.id_usuario = $idUsuario ";
}

$sql = $sql . "ORDER BY data_hora DESC";

$count = 0;
$result = mysqli_query($link, $sql);

$row = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) > 0) {

	echo "<table class=\"table table-bordered table-hover\">
			<thead>
				<th>Acesso</th>
				<th>Local</th>
			</thead>
			<tbody>";

	do {
        if ($count < 5){
			echo "<tr>";
			echo "<td>" .$row["data_hora"]. "</td><td>" .$row["nomeSala"]. "</td>";
			echo "</tr>";
			$count++;
		}
	} while($row = mysqli_fetch_assoc($result));

	echo "</tbody>
		</table>";
}else{
	echo "Não há acessos recentes!";
} 

?>