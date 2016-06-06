<?php

$link = mysqli_connect('localhost:3306', 'root', 'root');
if (!$link) {
    die('Não foi possível conectar: ' . mysqli_connect_error());
}

mysqli_select_db($link, "gandalf") or print(mysqli_error()); 

?>