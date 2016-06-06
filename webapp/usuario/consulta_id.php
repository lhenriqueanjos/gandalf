<?php

// montagem da query2

$query2 = "SELECT tipo FROM categoria_usuario WHERE id = ".$temp." ";

$resultado2 = mysqli_query($link, $query2) or die(mysqli_error());

echo $resultado2;

?>
