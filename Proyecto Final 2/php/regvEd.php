<!DOCTYPE HTML>
<html lang="es">
	<head> 
		<meta chaset="utf-8/">
		<meta name="description" content="que es nuestra pagina"/>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Bungee+Inline|Fjalla+One|Indie+Flower|Baloo+Bhaina">
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
		<link rel="stylesheet" type="text/css" href="../css/menu_nav.css">	
		<title>editar</title>
	</head>	
	<body>
	<nav class="arriba" id="barra_nav">
        <!-- logo -->
        <a href="../index.html"><img src="../img/logo.jpg" class="logo"></a>
        <!-- Menu -->
        <nav class="navbar">
          <a href="../index.html" name="inicio" class="active">Inicio</a>
          <a href="../registro.html" name="registro">Registro</a>
          <a href="../quienes_somos.html" name="quienes_somos">Quienes Somos?</a>
          <a href="../pruductos.html" name="productos">Pruductos</a>
          <a href="../base.html" name="base_info" >Base Informacion</a>
          <a href="../contacto.html" name="contacto">Contactenos</a>
        </nav>
      </nav>
        <?php
            $codigo = $_POST['codigo'];
            $referencia = $_POST['referencia'];
            $codReferencia = split ("\,", $referencia); 
            $indicador = $_POST['indicador'];
            $cantidad = $_POST['cantidad'];
            $link = mysqli_connect('sql212.byethost17.com','b7_19187821','admin123');
            mysqli_select_db($link, "b7_19187821_artesanias");
            mysqli_query($link, "update registroDeVentas set codReferencia=".$codReferencia[0].", indicador='".$indicador."', cantidad=".$cantidad.", fecha=CURDATE() where codigo=".$codigo);
            mysqli_close($link);
            header('Location: regv.php');
        ?>
	<footer>
		<p align="center">Artesanias San Jos&eacute; | contacto@asj.co | PBX: (57) 1 245 5700 | Carrera 42 No. 39 - 48. Bogota D.C., Colombia.</p>
	</footer>
	</body>
</html>
