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
        <link rel="stylesheet" type="text/css" href="..css/productos.css">
        <title>Empleados</title>
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
            <h1>Empleados</h1>
        </div>
        <table border=1 class="Texto_inicio">
            <tr>
                <td>

                    
                    <form name="formulario" method="post" action="Empleado.php">
                    <center><h3>Nuevo</h3></center>
                    Nombre:<input type="text" name="nombre" required/><br>
                    Cargo:<input type="text" name="cargo" required/><br>
                    <input type="submit" class="myButton">
                </form>
            </td>
            <td>
               <center><h3>Pagar</h3></center>
               <form name="formularioP" method="post" action="Pagar.php">
                    <select name="empleado">
                        <?php
                                $conn = mysqli_connect('sql110.byethost7.com','b7_19254943','admin123','b7_19254943_hotelticuna');
                        $sql = "SELECT codigo,nombre from empleados";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($result)){
                            //referencia
                            
                            echo "<option>".$row[0].",".$row[1]."</option>";
                        }
                            ?>
                    </select>
                    <input type="submit" class="myButton">
                </form>
            </td>
            <td>
                <!--Edicion-->
                <form name="edicion" method="post" action="empEd.php">
                Codigo:<input type="text" name="codigo" id="codEd" readonly="readonly"><br>
                Nombre:<input type="text" name="nombre" id="nomEd" required><br>
                Cargo:<input type="text" name="cargo" id="cargoEd" required><br>
                <input type="submit" class="myButton">
                </form>
            </td>
                <tr>
                
                    <?php
        $conn = mysqli_connect('sql110.byethost7.com','b7_19254943','admin123','b7_19254943_hotelticuna');
                        $sql = "SELECT * from empleados";
                        $result = mysqli_query($conn,$sql);
                        echo "
                            <table border = 1>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Cargo</th>
                                    <th>Sueldo</th>
                                    
                                </tr>";
                                $pagar = 0;
                                $i=1;
                        while($row = mysqli_fetch_array($result)){
                            //hallando sueldo
                            //seleccionamos las tareas
                            $suel="SELECT regt.codTarea,regt.cantidad,tar.precio from registroDeTareas regt, tareas tar where codEmpleado=".$row[0]." and pago='no' and regt.codTarea = tar.codigo ";
                            $rfc = mysqli_query($conn,$suel);
                            //las recorremos

                            while($w = mysqli_fetch_array($rfc)){
                               $pagar= $pagar+($w[1]*$w[2]);
                            }
                            echo "
                                <tr>
                                    <td id='codigo".$i."'>".$row[0]."</td>
                                    <td id='nombre".$i."'>".$row[1]."</td>
                                    <td id='cargo".$i."'>".$row[2]."</td>
                                    <td>".$pagar."</td>
                                    <td><input type='button' value='Editar' id='".$i."' onclick='editar(this.id)' class='myButton'></td>
                                </tr>";
                                $pagar = 0;
                                $i++;
                        }
                        
                        echo "</table>";
?>
                </tr>
                <script type="text/javascript">
         function editar(id) {
    document.getElementById("codEd").value=id;
    document.getElementById("nomEd").value=document.getElementById("nombre"+id).innerHTML;
    document.getElementById("cargoEd").value=document.getElementById("cargo"+id).innerHTML;
   }
    </script>
            </tr>
        </table>
        <a href="../base.html">volver</a>
        </center>
        <br>
        <br>
        <br>
        <br>
        <footer>
            <p align="center">Hotel Gran Colombiano | www.hotelticuna.byethost7.com| contacto@hotelgc.co | PBX: (57) 1 245 5700 | Carrera 42 No. 39 - 48. Bogot&aacute; D.C., Colombia.</p>
        </footer>
    </body>
</html>				