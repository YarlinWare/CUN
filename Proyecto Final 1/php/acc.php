
                        <?php
                        $usuario = $_POST['usuario'];
						$pass = $_POST['pass'];
                        try{
                        $conn = mysqli_connect('sql110.byethost7.com','b7_19254943','admin123','b7_19254943_hotelticuna');
                        $sql = "SELECT * from usuarios where usuario='".$usuario."' and contrasena='".$pass."'";
                        $result = mysqli_query($conn,$sql);
                        if($row = mysqli_fetch_array($result)){
                            print("entro");
                        	header("Location:../base.html");
                        }else{
                        	print("Usuario y/o contraseña incorrecto(s)<br><a href='index.php'>Intentar de nuevo</a>");
                        }
                        /*
                        if(!$result){
                        	print("Usuario y/o contraseña erroneos");
                        }else{
                        	
                        }
                       */
                           }catch(Exception $e){
                           	print($e);
                           }
                                

?>
