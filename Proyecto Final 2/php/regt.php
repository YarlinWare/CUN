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
        <table>
            <tr>
                <td>
                    Nuevo<br>
                     <form name="formulario" method="post" action="Registro_de_tareas.php">
                        <!-- Select para cargar las referencias-->
                        Tarea:<select name="tareas">
                            <?php
                                $conn = mysqli_connect('sql212.byethost17.com','b7_19187821','admin123','b7_19187821_artesanias');
                        $sql = "SELECT codigo,nombre from tareas";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($result)){
                            //referencia
                            
                            echo "<option>".$row[0].",".$row[1]."</option>";
                        }
                            ?>
                        </select>
                        <!-- -->
                        <br>
                    Empleado:<select name="empleados">
                            <?php
                                $conn = mysqli_connect('sql201.byethost18.com','b18_18863243','cedula1012421687','b18_18863243_pieceworkdb');
                        $sql = "SELECT codigo,nombre from empleados";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($result)){
                            //referencia
                            
                            echo "<option>".$row[0].",".$row[1]."</option>";
                        }
                            ?>
                        </select>
                        <!-- -->
                        <br>
                    Cantidad:<input type="text" name="cantidad" required/><br>
                    <input type="submit" class="myButton">
                </form>
                </td>
                <!--Edicion-->
                
                <!--Edicion/\-->
                <tr>
                    
                    <?php
        $conn = mysqli_connect('sql201.byethost18.com','b18_18863243','cedula1012421687','b18_18863243_pieceworkdb');
                        $sql = "SELECT * from registroDeTareas";
                        $result = mysqli_query($conn,$sql);
                        echo "
                            <table border = 1>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Tarea</th>
                                    <th>Empleado</th>
                                    <th>Cantidad</th>
                                    <th>Fecha</th>
                                    <th>Pago</th>
                                </tr>";
                                $i=1;
                        while($row = mysqli_fetch_array($result)){
                            //referencia
                            $sentencia = "SELECT nombre from tareas where codigo=".$row[1];
                            $tarea = mysqli_query($conn,$sentencia);
                            $tar=mysqli_fetch_array($tarea)[0];
                            //empleado
                            $sentencia = "SELECT nombre from empleados where codigo=".$row[2];
                            $empleado = mysqli_query($conn,$sentencia);
                            $emp=mysqli_fetch_array($empleado)[0];
                            echo "
                                <tr>
                                    <td>".$row[0]."</td>
                                    <td id='tarea".$i."'>".$tar."</td>
                                    <td id='empleado".$i."'>".$emp."</td>
                                    <td id='cantidad".$i."'>".$row[3]."</td>
                                    <td>".$row[4]."</td>
                                    <td id='valOn".$i."'>".$row[5]."</td>
                                    <td><input type='button' value='Editar' id='".$i."' onclick='editar(this.id)' class='myButton'></td>
                                </tr>";
                                $i++;
                        }
                        echo "</table>";
?>

                </tr>
                <script type="text/javascript">
                    function editar(id){
                        var tarea = document.getElementById("tarea"+id).innerHTML;
                        var empleado = document.getElementById("empleado"+id).innerHTML;
                        var cantidad = document.getElementById("cantidad"+id).innerHTML;
                        var valOn=document.getElementById("valOn"+id).innerHTML;
                        var valOff="";
                        if(valOn=="si"){
                            valOff="no";
                        }else{
                            valOff="si";
                        }
                        document.writeln("<center>Editar<br><br><form name='editar' method='post' action='regtEd.php'>Codigo:<input type='text' name='codEd' readonly='readonly' value='"+id+"'><br>Tarea actual: <b>"+tarea+"</b><br>Tarea:<select name='tareaEd' id='tareaEd'><?php $conn = mysqli_connect('sql201.byethost18.com','b18_18863243','cedula1012421687','b18_18863243_pieceworkdb');$sql = "SELECT codigo,nombre from tareas";$result = mysqli_query($conn,$sql);while($row = mysqli_fetch_array($result)){
                            echo '<option>'.$row[0].','.$row[1].'</option>';} ?></select><br>Empleado actual: <b>"+empleado+"</b><br>Empleado:<select name='empleadoEd' id='empleadoEd'><?php $conn = mysqli_connect('sql201.byethost18.com','b18_18863243','cedula1012421687','b18_18863243_pieceworkdb');
                        $sql = "SELECT codigo,nombre from empleados";$result = mysqli_query($conn,$sql);while($row = mysqli_fetch_array($result)){echo '<option>'.$row[0].','.$row[1].'</option>';} ?></select><br>Cantidad:<input type='text' name='cantidadEd' value='"+cantidad+"' required/><br>Pago:<select name='pagoEd'><option>"+valOn+"</option><option>"+valOff+"</option></select><br><input type='submit'></form></center>");
                        document.getElementById("tareaEd").selectedIndex= -1;
                        document.getElementById("empleadoEd").selectedIndex= -1;

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
