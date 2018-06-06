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
        <link rel="stylesheet" type="text/css" href="..css/usuarios.css">

        <title>ventas</title>
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
        <h1>Ventas</h1>
    </div>         
        <table border=1 class="Texto_inicio">
            <tr>
                <td>
                    
                    <form name="formulario" method="post" action="Registro_de_ventas.php">
                    <center><h3>Nuevo</h3></center>
                        <!-- Select para cargar las referencias-->
                        Referencia:<select name="referencia">
                            <?php
                            /*coneccion con la base de datos que esta creada en el hosting byet.host:
                            Cpanel Username: b7_19254943
                            Cpanel Password: admin123
                            Your URL: http://hotelticuna.byethost7.com or http://www.hotelticuna.byethost7.com
                            FTP Server : ftp.byethost7.com
                            FTP Login : b7_19254943
                            FTP Password : admin123
                            MySQL Database Name: MUST CREATE IN CPANEL
                            MySQL Username : b7_19254943
                            MySQL Password : admin123
                            MySQL Server: SEE THE CPANEL
                            Cpanel URL: http://cpanel.byethost7.com/     
                            */
                                $conn = mysqli_connect('sql110.byethost7.com','b7_19254943','admin123','b7_19254943_hotelticuna');
                        $sql = "SELECT codigo,nombre from referencias";
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($result)){
                            //referencia
                            
                            echo "<option>".$row[0].",".$row[1]."</option>";
                        }
                            ?>
                        </select>
                        <!-- -->
                        <br>
                    Indicador:<input type="text" name="indicador"><br>
                    Cantidad:<input type="text" name="cantidad" required/><br>
                    <input type="submit"  class="myButton">
                </form>
                </td>
              
                </tr>
                 <tr>
                  
                    <?php
        $conn = mysqli_connect('sql110.byethost7.com','b7_19254943','admin123','b7_19254943_hotelticuna');
                        $sql = "SELECT * from registroDeVentas";
                        $result = mysqli_query($conn,$sql);
                        echo "
                            <table border= 1>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Referencia</th>
                                    <th>Indicador</th>
                                    <th>Cantidad</th>
                                    <th>Fecha</th>
                                </tr>";
                                $i=1;
                        while($row = mysqli_fetch_array($result)){
                            //referencia
                            $sentencia = "SELECT nombre from referencias where codigo=".$row[1];
                            $referencia = mysqli_query($conn,$sentencia);
                            $ref=mysqli_fetch_array($referencia)[0];
                            echo "
                                <tr>
                                    <td>".$row[0]."</td>
                                    <td id='referencia".$i."'>".$ref."</td>
                                    <td id='indicador".$i."'>".$row[2]."</td>
                                    <td id='cantidad".$i."'>".$row[3]."</td>
                                    <td>".$row[4]."</td>
                                    <td><input type='button' value='Editar' id='".$i."' onclick='editar(this.id)'  class='myButton'></td>
                                </tr>";
                                $i++;
                                
                        }
                        echo "</table>";
?>


                </tr>
            <script type="text/javascript">
                function editar(id){
                    var indicador= document.getElementById("indicador"+id).innerHTML;
                    var cantidad=document.getElementById("cantidad"+id).innerHTML;
                    //referencia
                    var referencia=document.getElementById("referencia"+id).innerHTML;
                    document.writeln("<center>");
                document.writeln("<form name='editar' method='post' action='regvEd.php'>Editar Codigo:<input name='codigo' type='text' value='"+id+"' readonly='readonly'>");
                document.writeln("<br>Indicador:<input type='text' name='indicador' value='"+indicador+"'><br>Cantidad:<input type='text' name='cantidad' value='"+cantidad+"' required/><br>La referencia actual es:<b>"+referencia+"</b> <br>Referencia:<select name='referencia' id='selref'><?php $conn = mysqli_connect('sql110.byethost7.com','b7_19254943','admin123','b7_19254943_hotelticuna');$sql = 'SELECT codigo,nombre from referencias';$result = mysqli_query($conn,$sql);while($row = mysqli_fetch_array($result)){echo '<option>'.$row[0].','.$row[1].'</option>';}?>");
                document.writeln("<hr>");  
                document.writeln("<input type='submit'></form>");
               document.writeln("<br><br><a href='regv.php'>Cancelar</a></center>");
               var selref = -1;
               document.getElementById("selref").selectedIndex=selref;
            }
                
            </script>
            
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

			