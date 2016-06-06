<?php

// query para selecionar o tipo conforme a id_categoria
// ele está num arquivo separado pois precisa ser executado a cada ciclo do while
$queryCategoria = "SELECT tipo FROM categoria_usuario WHERE id = ".$linha['id_categoria']." ";

$resultado2 = mysqli_query($link, $queryCategoria) or die(mysqli_error($link));

$row = mysqli_fetch_assoc($resultado2);

?>
