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
                    <form name="formulario" method="post" action="Registro_de_ventas.php">
                        <!-- Select para cargar las referencias-->
                        Referencia:<select name="referencia">
                            <?php
                            /*coneccion con la base de datos que esta creada en el hosting byet.host:
                            Mysql username: b7_19197821
                            Mysql password: admin123
                            Mysql hostname: sql212.byethost17.com
                            FTP hostname ftp.byethost7.com
                            Home page: http:// artesanias.byethost7.com

                            -------Info: base de datos----------

                            MySQL DB Name b7_19187821_artesanias
                            MySQL User Name b7_19187821
                            MySQL Password (Your cPanel Password)
                            MySQL Host Name  sql212.byethost7.com
     
                            */
                                $conn = mysqli_connect('sql212.byethost17.com','b7_19187821','admin123','b7_19187821_artesanias');
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
        $conn = mysqli_connect('sql212.byethost17.com','b7_19187821','admin123','b7_19187821_artesanias');
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
                document.writeln("<br>Indicador:<input type='text' name='indicador' value='"+indicador+"'><br>Cantidad:<input type='text' name='cantidad' value='"+cantidad+"' required/><br>La referencia actual es:<b>"+referencia+"</b> <br>Referencia:<select name='referencia' id='selref'><?php $conn = mysqli_connect('sql201.byethost18.com','b18_18863243','cedula1012421687','b18_18863243_pieceworkdb');$sql = 'SELECT codigo,nombre from referencias';$result = mysqli_query($conn,$sql);while($row = mysqli_fetch_array($result)){echo '<option>'.$row[0].','.$row[1].'</option>';}?>");
                document.writeln("<hr>");  
                document.writeln("<input type='submit'></form>");
               document.writeln("<br><br><a href='regv.php'>Cancelar</a></center>");
               var selref = -1;
               document.getElementById("selref").selectedIndex=selref;
            }
                
            </script>
            
        </table>
        <a href="../costos.html">volver</a>
        </center>
        <br>
        <br>
        <br>
        <br>
    <footer>
    <p align="center">Artesanias San Jos&eacute; | contacto@asj.co | PBX: (57) 1 245 5700 | Carrera 42 No. 39 - 48. Bogota D.C., Colombia.</p>
    </footer>
    </body>
</html>
