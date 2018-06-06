<?php
$tarea = $_POST['tareas'];
$codTarea = split ("\,", $tarea); 
$empleado = $_POST['empleados'];
$codEmpleado = split ("\,", $empleado); 
$cantidad = $_POST['cantidad'];
$link = mysqli_connect('sql212.byethost17.com','b7_19187821','admin123');
mysqli_select_db($link, "b7_19187821_artesanias");
mysqli_query($link, "INSERT INTO registroDeTareas(codTarea,codEmpleado,cantidad,fecha,pago) VALUES (".$codTarea[0].",".$codEmpleado[0].",".$cantidad.",CURDATE(),'no')");
mysqli_close($link);
header('Location: regt.php');

?>