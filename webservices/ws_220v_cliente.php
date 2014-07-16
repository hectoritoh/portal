<?php
    require_once "nusoap-0.9.5/lib/nusoap.php";
    $cliente = new nusoap_client("http://server.celmedia.info/Portal/webservices/ws_220v.php");
      
    $error = $cliente->getError();
    if ($error) {
        echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
    }
      
    
echo "<br>webservice.verificarBase<br>";
$result = $cliente->call("webservice.verificarBase", array("provider" => "Instagram","identifier" => "225648327" ));   	   
print_r($result);   

echo "<br>webservice.obtenerFotoXId<br>";
$result = $cliente->call("webservice.obtenerFotoXId", array("idUser" => 4 ));   	   
print_r($result); 

http://localhost/220V/verificarPorCorreo.php?proveedor=Email&identificador=roggerpesantes@hotmail.com&contrasena=6cf82ee1020caef069e753c67a97a70d
echo "<br>webservice.verificarBaseXMail<br>" ; 
$result = $cliente->call("webservice.verificarBaseXMail",  array( "provider" => "Email","identifier" => "roggerpesantes@hotmail.com","pass" => "827ccb0eea8a706c4c34a16891f84e7b" ) );   	   
print_r($result);   
  
echo "<br>webservice.existeUsuarioXId<br>" ; 
$result = $cliente->call("webservice.existeUsuarioXId", array("idUser" => 4 ));   	   
print_r($result); 


echo "<br>webservice.almacenarUsuario<br>" ;

$udata['identifier'] = "2072043331";
$udata['webSiteURL'] = "";
$udata['profileURL'] = "";
$udata['photoURL'] = "http://pbs.twimg.com/profile_images/378800000606190928/c5b44895834bf3010bc0f139e52c0c1f_normal.jpeg";
$udata['displayName'] = "SANDRADE";
$udata['description'] = "";
$udata['firstName'] = "";
$udata['lastName'] = "";
$udata['gender'] = "";
$udata['language'] = "";
$udata['age'] = "";
$udata['birthDay'] = "";
$udata['birthMonth'] = "";
$udata['birthYear'] = "";
$udata['email'] = "";
$udata['emailVerified'] = "";
$udata['phone'] = "";
$udata['address'] = "";
$udata['country'] = "";
$udata['region'] = "";
$udata['city'] = "";
$udata['zip'] = "";

$ud = json_encode($udata);

//echo $ws->almacenarUsuario("Santiago Andrade", "1710915750", "seyacat@gmail.com", "0998788635", "male", "Quito", "email", json_encode($udata) );
$result = $cliente->call("webservice.almacenarUsuario", array("nombreapellido" => "Santiago Andrade","cedula" => "1710915750","email" => "seyacat@gmail.com",
						"celular" => "0998788635",
        				"genero" => "male","ciudad" => "Quito","provider" => "email","user_data" => "$ud" ));   	   
print_r($result);  

echo "<br>webservice.obtenerMedallas<br>" ;
$result = $cliente->call("webservice.obtenerMedallas", array("idUser" => 4 ));   	   
print_r($result); 

echo "<br>webservice.envio_correo_ganar_medalla<br>" ;
$result = $cliente->call("webservice.envio_correo_ganar_medalla", array( "correo" => "seyacat@gmail.com","nombre_medalla" => "medallaOK" ));   	   
print_r($result);

echo "<br>webservice.webservice.consultar_codigo_por_post<br>" ;
$result = $cliente->call("webservice.consultar_codigo_por_post", array( "idUsuario" => "4","codigo" => "125AB" ));   	   
print_r($result);

echo "<br>webservice.hacer_el_canje_de_premios<br>" ;
$result = $cliente->call("webservice.envio_correo_ganar_medalla", array( "idUser" => "4","idPremio" => "2" ));   	   
print_r($result); 
  
echo "<br>" ;
    
?>
