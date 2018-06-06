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
                    <form name="formulario" method="post" action="Empleado.php">
                    Nombre:<input type="text" name="nombre" required/><br>
                    Cargo:<input type="text" name="cargo" required/><br>
                    <input type="submit" class="myButton">
                </form>
            </td>
            <td>
                Pagar:<form name="formularioP" method="post" action="Pagar.php">
                    <select name="empleado">
                        <?php
                                $conn = mysqli_connect('sql212.byethost17.com','b7_19187821','admin123','b7_19187821_artesanias');
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
        $conn = mysqli_connect('sql212.byethost17.com','b7_19187821','admin123','b7_19187821_artesanias');
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
        <a href="../costos.html">volver</a>
        </center>
        <br>
        <br>
        <br>
        <br>
    <footer>
    <p align="center">Artesanias San José | contacto@asj.co | PBX: (57) 1 245 5700 | Carrera 42 No. 39 - 48. Bogota D.C., Colombia.</p>
    </footer>
    </body>
</html>
