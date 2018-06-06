<?php
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$cargo = $_POST['cargo'];
$link = mysqli_connect('sql110.byethost7.com','b7_19254943','admin123');
mysqli_select_db($link, "b7_19254943_hotelticuna");
mysqli_query($link, "update empleados set nombre='".$nombre."', cargo='".$cargo."' where codigo=".$codigo);
mysqli_close($link);
header('Location: emp.php');

?>