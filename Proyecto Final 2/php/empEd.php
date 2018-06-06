<?php
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$cargo = $_POST['cargo'];
$link = mysqli_connect('sql212.byethost17.com','b7_19187821','admin123');
mysqli_select_db($link, "b7_19187821_artesanias");
mysqli_query($link, "update empleados set nombre='".$nombre."', cargo='".$cargo."' where codigo=".$codigo);
mysqli_close($link);
header('Location: emp.php');

?>