<?php
$referencia = $_POST['referencia'];
$codReferencia = split ("\,", $referencia); 
$indicador = $_POST['indicador'];
$cantidad = $_POST['cantidad'];
$link = mysqli_connect('sql110.byethost7.com','b7_19254943','admin123');
mysqli_select_db($link, "b7_19254943_hotelticuna");
mysqli_query($link, "INSERT INTO registroDeProduccion(codReferencia,indicador,cantidad,fecha) VALUES (".$codReferencia[0].",'".$indicador."',".$cantidad.",CURDATE())");
mysqli_close($link);
header('Location: regp.php');

?>