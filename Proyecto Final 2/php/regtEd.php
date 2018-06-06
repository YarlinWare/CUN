<?php
$codigo = $_POST['codEd'];
$tarea = $_POST['tareaEd'];
$codTarea = split ("\,", $tarea); 
$empleado = $_POST['empleadoEd'];
$codEmpleado = split ("\,", $empleado); 
$cantidad = $_POST['cantidadEd'];
$pago= $_POST['pagoEd'];
$link = mysqli_connect('sql212.byethost17.com','b7_19187821','admin123');
mysqli_select_db($link, "b7_19187821_artesanias");
mysqli_query($link, "update registroDeTareas set codTarea=".$codTarea[0].", codEmpleado=".$codEmpleado[0].", cantidad=".$cantidad.", fecha=CURDATE(), pago='".$pago."' where codigo=".$codigo);
mysqli_close($link);
header('Location: regt.php');

?>