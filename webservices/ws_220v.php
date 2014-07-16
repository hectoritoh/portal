<?php

require_once("nusoap-0.9.5/lib/nusoap.php");

include("webservice.php");

$ws = new webservice();  
//echo $ws->verificarBase("Instagram","225648327");   
//die($ws->obtenerFotoXId(4));  
//echo($ws->existeUsuarioXId(4));
//print_r($ws->obtenerMedallas(4));
//die();
//echo $ws->verificarBaseXMail("Email","roggerpesantes@hotmail.com","827ccb0eea8a706c4c34a16891f84e7b");
//echo $ws->hacer_el_canje_de_premios(4,1);

//echo $ws->consultar_codigo_por_post(4,"125AB");
//die(  );

/*[identifier] => obligatorio
 [webSiteURL] =>
 [profileURL] =>
 [photoURL] => obligatorio
 [displayName] => obligatorio
 [description] =>
 [firstName] =>
 [lastName] =
 [gender] =>
 [language] =>
 [age] =
 [birthDay] =>
 [birthMonth] =>
 [birthYear] =>
 [email] =>
 [emailVerified] =>
 [phone] =>
 [address] =>
 [country] =>
 [region] =>
 [city] =>
 [zip] =>

17 	Twitter 	207204333 		NULL	xinita_cm 	Yuri Elizabeth 		http://twitter.com/xinita_cm 		2014-02-28 09:49:19 	
http://pbs.twimg.com/profile_images/37880000060619... 	just love â™¡ 
 
 */
/*
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

echo $ws->almacenarUsuario("Santiago Andrade", "1710915750", "seyacat@gmail.com", "0998788635", "male", "Quito", "email", json_encode($udata) );

die();*/
 
 
function getProd($categoria){return $ws->getProd($categoria);} 
      
$server = new soap_server();

/*El primer array nos permite definir el argumento de entrada y su tipo de datos
    El segundo define la función de retorno y su tipo de datos
    urn:producto es la definición del namespace
    urn:producto#getProd es donde definimos la acción SOAP
    Luego viene el tipo de llamada,que puede ser rpc, como en el ejemplo, o document
    Tras esto definimos el valor del atribute use, que puede ser encoded o literal
    Finalmente viene una descripción de qué hace el método al que llamamos
*/
$server->configureWSDL("220v", "urn:220v");

    
$server->register("webservice.verificarBase",
        array( "provider" => "xsd:string","identifier" => "xsd:string" ),
        array("return" => "xsd:int"),
        "urn:220v",
        "urn:220v#webservice.verificarBase",
        "rpc",
        "encoded",
        "Verifica la existencia un registro en la tabla “authentications”. Si el parámetro “provider” coincide con el campo “provider” y el campo “identifier” coincide con el campo “provider_uid”, retorna el campo “user_id”.
Retorna
En caso de existir: Retorna un int con el valor de “user_id”.
En caso de no existencia:
- Retorna 0
Tablas a las que accede");      
        
        
        
        
$server->register("webservice.obtenerFotoXId",
        array( "idUser" => "xsd:int" ),
        array("return" => "xsd:string"),
        "urn:220v",
        "urn:220v#webservice.obtenerFotoXId",
        "rpc",
        "encoded",
        "Verifica la existencia un registro en la tabla “authentications”. Si el parámetro “idUser” coincide con el campo “id” retorna el campo “photo_url”.
Retorna
En caso de existir: Retorna un string con el valor de “photo”.
En caso de no existencia:
- Retorna null
Tablas a las que accede
authentications"); 


//verificarBaseXMail($provider,$identifier,$pass) 
$server->register("webservice.verificarBaseXMail",
        array( "provider" => "xsd:string","identifier" => "xsd:string","pass" => "xsd:string" ),
        array("return" => "xsd:string"),
        "urn:220v",
        "urn:220v#webservice.verificarBaseXMail",
        "rpc",
        "encoded",
        "Verifica la existencia un registro en la tabla “authentications”. Si el parámetro “provider” es igual a “Email” Y si el campo “identifier” coincide con el campo “provider_uid” Y si el parámetro “pass” coincide con el campo “password”, Obtiene el campo “user_id”.
Retorna
En caso de existir: Retorna un int con el valor de “user_id”.
En caso de no existencia:
- Retorna 0"); 


$server->register("webservice.existeUsuarioXId",
        array( "idUser" => "xsd:int" ),
        array("return" => "xsd:string"),
        "urn:220v",
        "urn:220v#webservice.existeUsuarioXId",
        "rpc",
        "encoded",
        "Verifica la existencia un registro en la tabla “usuario”. Si el parámetro “idUsuario” coincide con el campo “id” retorna el ese registro de la tabla.
Retorna
En caso de existir: Retorna un registro de la tabla.
En caso de no existencia:
- Retorna null
Tablas a las que accede
usuario"); 

//almacenarUsuario($nombreapellido, $cedula, $email, $celular, $genero, $ciudad, $provider, $user_data)
$server->register("webservice.almacenarUsuario",
        array( "nombreapellido" => "xsd:string","cedula" => "xsd:string","email" => "xsd:string","celular" => "xsd:string",
        				"genero" => "xsd:string","ciudad" => "xsd:string","provider" => "xsd:string","user_data" => "xsd:string" ),
        array("return" => "xsd:int"),
        "urn:220v",
        "urn:220v#webservice.almacenarUsuario",
        "rpc",
        "encoded",
        "Verifica la existencia un registro en la tabla “usuario”. Si el parámetro “idUsuario” coincide con el campo “id” retorna el ese registro de la tabla.
Retorna
En caso de existir: Retorna un registro de la tabla.
En caso de no existencia:
- Retorna null
Tablas a las que accede
usuario"); 


$server->register("webservice.obtenerMedallas",
        array( "idUser" => "xsd:int" ),
        array("return" => "xsd:string"),
        "urn:220v",
        "urn:220v#webservice.obtenerMedallas",
        "rpc",
        "encoded",
        "Funcion que devuelve un Array de medallas según el id de usuario que recibe como parámetro."); 
        
 
$server->register("webservice.envio_correo_ganar_medalla",
        array( "correo" => "xsd:string","nombre_medalla" => "xsd:string" ),
        array("retorno" => "xsd:int"),
        "urn:220v",
        "urn:220v#webservice.envio_correo_ganar_medalla",
        "rpc",
        "encoded",
        "Funcion que devuelve un Array de medallas según el id de usuario que recibe como parámetro."); 
 
//$ws->consultar_codigo_por_post(4,"125AB"); 
 $server->register("webservice.consultar_codigo_por_post",
        array( "idUsuario" => "xsd:string","codigo" => "xsd:string" ),
        array("retorno" => "xsd:int"),
        "urn:220v",
        "urn:220v#webservice.consultar_codigo_por_post",
        "rpc",
        "encoded",
        "Funcion que devuelve un Array de medallas según el id de usuario que recibe como parámetro."); 
  
 //hacer_el_canje_de_premios($idUser,$idPremio)  
 $server->register("webservice.hacer_el_canje_de_premios",
        array( "idUser" => "xsd:string","idPremio" => "xsd:string" ),
        array("retorno" => "xsd:int"),
        "urn:220v",
        "urn:220v#webservice.hacer_el_canje_de_premios",
        "rpc",
        "encoded",
        "Este proceso se realiza cuando el usuario tiene desactivado los premios en la página y aparecen en un lightbox un botón para realizar el canje, 
cuando el usuario da click en “canjear” automaticamente se envia por post el premio (idUsuario, idPremio) y el identificador del usuario logueado.

Este proceso ejecuta dos querys.");   
      

if(isset($HTTP_RAW_POST_DATA)) {    
	$server->service($HTTP_RAW_POST_DATA);
	}
else{
	$server->service("<?xml version='1.0' ?>
<env:Envelope xmlns:env=\"http://www.w3.org/2003/05/soap-envelope\"> 
  <env:Header>
   
  </env:Header>
  <env:Body>
    
  </env:Body>
</env:Envelope>");
	}






        

/*$sqlMedallas = "

SELECT *

FROM usuario_medalla

WHERE usuario_id=".$usuario."

";

$sqlMedallaMostrar = "

SELECT *

FROM medalla

WHERE id=".$med_id."

";*/
