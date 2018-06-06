<!DOCTYPE HTML>

<html lang="es">
    
    <head> 
        <meta chaset="utf-8/">
        <meta name="description" content="que es nuestra pagina"/>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Bungee+Inline|Fjalla+One">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../css/menu_nav.css"> 
        <link rel="stylesheet" type="text/css" href="../css/login.css"> 
        <link rel="stylesheet" type="text/css" href="..css/costos.css">
        <title>Inventario</title>
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
            <a href="php/index.php" name="contacto" class="active">Usuarios</a>
            <a href="../contacto.html" name="contacto">Contactenos</a>
        </nav>
    </nav>
    
    <center>
    <div class="Texto_inicio">
        <h1>Inventario</h1>
    </div>
        <!--muestra de inventario-->
        <?php
        $conn = mysqli_connect('sql110.byethost7.com','b7_19254943','admin123','b7_19254943_hotelticuna');
                        $sql = "SELECT * FROM `referencias`";
                        $result = mysqli_query($conn,$sql);
                        echo "
                            <table border = 1>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Unidades existentes</th>
                                    <th>Valor Total</th>
                                </tr>";

                        while($row = mysqli_fetch_array($result)){
                        	//consultado unidades producidas
                                $producido = 'SELECT cantidad from registroDeProduccion where codReferencia = '.$row[0];
                                $rdp = mysqli_query($conn,$producido);
                                $rdpt = 0;
                                while($p = mysqli_fetch_array($rdp)){
                                	$rdpt = $rdpt+$p[0];
                                }
                            //consultando las cantidades vendidas
                                $vendido = 'SELECT cantidad from registroDeVentas where codReferencia = '.$row[0];
                                $rdv = mysqli_query($conn,$vendido);
                                $rdvt = 0;
                                while($v = mysqli_fetch_array($rdv)){
                                	$rdvt = $rdvt+$v[0];
                                }
                            //obteniendo total
                                $inv = $rdpt - $rdvt;
                                $prec = $inv * $row[2];
                            echo "
                                <tr>
                                    <td>".$row[0]."</td>
                                    <td>".$row[1]."</td>
                                    <td>".$inv."</td>
                                    <td>".$prec."</td>
                                </tr>";
                        }
                        echo "</table>";
?>
    <a href="../base.html">volver</a>
    </center>
<br><br><br>

       <footer>
            <p align="center">Hotel Gran Colombiano | www.hotelticuna.byethost7.com| contacto@hotelgc.co | PBX: (57) 1 245 5700 | Carrera 42 No. 39 - 48. Bogot&aacute; D.C., Colombia.</p>
        </footer>
    </body>
</html>

