<?php
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$link = mysqli_connect('sql212.byethost17.com','b7_19187821','admin123');
mysqli_select_db($link, "b7_19187821_artesanias");
mysqli_query($link, "update tareas set nombre='".$nombre."', precio=".$precio." where codigo=".$codigo);
mysqli_close($link);
header('Location: tar.php');

?>