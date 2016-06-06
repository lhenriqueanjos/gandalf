<?php

require $_SERVER["DOCUMENT_ROOT"]. "/gandalf/webapp/conexao.php";

$sql = "SELECT DATE_FORMAT(data_hora, '%d/%m/%Y %H:%i:%s') as data_hora, id_sala FROM acesso"; // TODO -> associar ao usuário logado, para puxar o histórico correto
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
		echo "<td>" .$row["data_hora"]. "</td><td>" .$row["id_sala"]. "</td>";
		echo "</tr>";
    }
} else {
    echo "0 results"; // TODO -> fazer a tabela mostrar que nao há resultados
}

?>