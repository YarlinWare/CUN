<!DOCTYPE HTML>

<html lang="es">
    
    <head> 
        <meta chaset="utf-8/">
        <meta name="description" content="que es nuestra pagina"/>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Bungee+Inline|Fjalla+One|Indie+Flower|Baloo+Bhaina">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../css/menu_nav.css">     
        <link rel="stylesheet" type="text/css" href="../css/costos.css">
        <title> </title>
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
        <center>
        <table border=1>
            <tr>
                <td>

                    Nuevo<br>
                    <form name="formulario" method="post" action="Referencia.php">
                    
                    Nombre:<input type="text" name="nombre" required/><br>
                    Precio:<input type="text" name="precio" required/><br>
                    <input type="submit" class="myButton">
                </form>
            </td>
            <td>
                Editar:<br>
                <form name="edicion" method="post" action="refEd.php">
                    Codigo:<input type="text" name="codigo" id="codEd" readonly="readonly"><br>
                    Nombre:<input type="text" name="nombre" id="nombreEd" required/><br>
                    Precio:<input type="text" name="precio" id="precioEd" required/><br>
                    <input type="submit" class="myButton">
                </form>
            </td>
                <tr>
                    <?php
        $conn = mysqli_connect('sql212.byethost17.com','b7_19187821','admin123','b7_19187821_artesanias');
                        $sql = "SELECT * from referencias";
                        $result = mysqli_query($conn,$sql);
                        echo "
                            <table border = 1>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                </tr>";
                                $i=1;
                        while($row = mysqli_fetch_array($result)){
                            echo "
                                <tr>
                                    <td id='codigo".$i."'>".$row[0]."</td>
                                    <td id='nombre".$i."'>".$row[1]."</td>
                                    <td id='precio".$i."'>".$row[2]."</td>
                                    <td><input type='button' value='Editar' id='".$i."' onclick='editar(this.id)' class='myButton'></td>
                                </tr>";
                                $i++;
                        }
                        echo "</table>";
?>
                </tr>
                <script type="text/javascript">
                function editar(id) {
    document.getElementById("codEd").value=id;
    document.getElementById("nombreEd").value=document.getElementById("nombre"+id).innerHTML;
    document.getElementById("precioEd").value=document.getElementById("precio"+id).innerHTML;
   }
            </script>
            </tr>
        </table>
        <a href="../costos.html">volver</a>
        </center>
    <footer>
    <p align="center">Artesanias San José | contacto@asj.co | PBX: (57) 1 245 5700 | Carrera 42 No. 39 - 48. Bogota D.C., Colombia.</p>
    </footer>
    </body>
</html>
