<?php
	$empleado = $_POST['empleado'];
	$codEmpleado = split ("\,", $empleado);
	
	$link = mysqli_connect('sql212.byethost17.com','b7_19187821','admin123');
mysqli_select_db($link, "b7_19187821_artesanias");
$sql="update registroDeTareas set pago='si' where codEmpleado=".$codEmpleado[0];
mysqli_query($link, $sql);
mysqli_close($link);
header('Location: emp.php');
 

?>