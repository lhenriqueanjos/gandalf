<?php

$link = mysql_connect('localhost:3306', 'root', 'root');
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}

mysql_select_db("gandalf", $link) or print(mysql_error()); 

?>