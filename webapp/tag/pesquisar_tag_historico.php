<?php

require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

$sql = "SELECT DATE_FORMAT(data_hora, '%d/%m/%Y %H:%i:%s') as data_hora, id_sala, id FROM acesso ORDER BY data_hora DESC"; // TODO -> associar ao usuário logado, para puxar o histórico correto
$result = mysqli_query($link, $sql);

$count = 0;

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if ($count < 5){
		echo "<tr>";
		$queryCategoria = "SELECT nome FROM sala WHERE id = ".$row['id_sala']." ";
		$resultado2 = mysqli_query($link, $queryCategoria) or die(mysqli_error($link));
		$linha = mysqli_fetch_assoc($resultado2);
		echo "<td>" .$row["data_hora"]. "</td><td>" .$linha["nome"]. "</td>";
		echo "</tr>";
		$count++;
		}
    }
} 
?>
