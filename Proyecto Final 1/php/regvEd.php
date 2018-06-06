<!DOCTYPE HTML>

<html lang="es">
    
    <head> 
        <meta chaset="utf-8/">
        <meta name="description" content="que es nuestra pagina"/>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Bungee+Inline|Fjalla+One">
        <link rel="stylesheet" type="text/css" href="..css/estilo.css">
        <link rel="stylesheet" type="text/css" href="..css/menu_nav.css">
        <link rel="stylesheet" type="text/css" href="..css/productos.css">
        <link rel="stylesheet" type="text/css" href="..css/costos.css">
        <title>Login</title>
    </head> 

    <body>
    
    <nav class="arriba">
        <a href="../Hotel 2.html"><img src="../img/htc.jpg" class="logo"></a>
        <nav class="navbar">
            <a href="../Hotel 2.html" name="inicio">Inicio</a>
            <a href="../registro.html" name="registro" >Registro</a>
            <a href="../quienes_somos.html" name="quienes_somos">Quienes Somos?</a>
            <a href="../sedes.html" name="sedes">Sedes</a>
            <a href="../costos.html" name="costos">Costos</a>
            <a href="index.php" name="contacto" class="active">Usuarios</a>
            <a href="../contacto.html" name="contacto">Contactenos</a>
        </nav>
    </nav>
        <?php
            $codigo = $_POST['codigo'];
            $referencia = $_POST['referencia'];
            $codReferencia = split ("\,", $referencia); 
            $indicador = $_POST['indicador'];
            $cantidad = $_POST['cantidad'];
            $link = mysqli_connect('sql110.byethost7.com','b7_19254943','admin123');
            mysqli_select_db($link, "b7_19254943_hotelticuna");
            mysqli_query($link, "update registroDeVentas set codReferencia=".$codReferencia[0].", indicador='".$indicador."', cantidad=".$cantidad.", fecha=CURDATE() where codigo=".$codigo);
            mysqli_close($link);
            header('Location: regv.php');
        ?>
        <footer>
            <p align="center">Hotel Gran Colombiano | www.hotelticuna.byethost7.com| contacto@hotelgc.co | PBX: (57) 1 245 5700 | Carrera 42 No. 39 - 48. Bogot&aacute; D.C., Colombia.</p>
        </footer>
    </body>
</html>
