<?php
$nombre = $_POST['nombre'];
$cargo = $_POST['cargo'];
$link = mysqli_connect('sql212.byethost17.com','b7_19187821','admin123');
mysqli_select_db($link, "b7_19187821_artesanias");
mysqli_query($link, "INSERT INTO empleados(nombre,cargo) VALUES ('".$nombre."','".$cargo."')");
mysqli_close($link);
header('Location: emp.php');

?>