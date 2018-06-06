
                        <?php
                        $usuario = $_POST['usuario'];
						$pass = $_POST['pass'];
                        try{
                        $conn = mysqli_connect('sql212.byethost7.com','b7_19187821','admin123','b7_19187821_artesanias');
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
                                

/*print (encriptar_AES("1012421687", "saras")."<br>");                                
print (desencriptar_AES("ff37a817d1258d5082768ef630a4c279c23cba599ac27b314be87912deaf14c0", "saras"));






function encriptar_AES($string, $key)
{
    $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_DEV_URANDOM );
    mcrypt_generic_init($td, $key, $iv);
    $encrypted_data_bin = mcrypt_generic($td, $string);
    mcrypt_generic_deinit($td);
    mcrypt_module_close($td);
    $encrypted_data_hex = bin2hex($iv).bin2hex($encrypted_data_bin);
    return $encrypted_data_hex;
}
 
function desencriptar_AES($encrypted_data_hex, $key)
{
    $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
    $iv_size_hex = mcrypt_enc_get_iv_size($td)*2;
    $iv = pack("H*", substr($encrypted_data_hex, 0, $iv_size_hex));
    $encrypted_data_bin = pack("H*", substr($encrypted_data_hex, $iv_size_hex));
    mcrypt_generic_init($td, $key, $iv);
    $decrypted = mdecrypt_generic($td, $encrypted_data_bin);
    mcrypt_generic_deinit($td);
    mcrypt_module_close($td);
    return $decrypted;
}
*/
?>
