<?php

require_once "nusoap-0.9.5/lib/nusoap.php";

class webservice{
	
	private $ql;
	private $host='localhost';
	private $user='root';
	private $password='cerebro';
	private $db='ws_test';

	function webservice(){
		$this->connect();
		}	
	
	function connect(){
		
		//try{	
		$this->ql = new mysqli($this->host, $this->user, $this->password, $this->db);
				if(mysqli_connect_errno()){
				echo mysqli_connect_error();
			    	}
		//}catch(Exception $e){}
		
		}	
    
      
    /*
    
    Función
verificarBase(provider, identifier)
Descripción
Verifica la existencia un registro en la tabla “authentications”. Si el parámetro “provider” coincide con el campo “provider” y el campo “identifier” coincide con el campo “provider_uid”, retorna el campo “user_id”.
Retorna
En caso de existir: Retorna un int con el valor de “user_id”.
En caso de no existencia:
- Retorna 0
Tablas a las que accede
authentications*/
		public function verificarBase($provider,$identifier) {
				$query="SELECT user_id FROM authentications WHERE provider='$provider' and provider_uid='$identifier' ";
		      $result = $this->ql->query($query); 				
		      if (!$result) return 0;
		      if ($result->num_rows == 0) return 0;
		      $row = $result->fetch_assoc();
		      return $row["user_id"];
		    }
		
		
		/*Función
obtenerFotoXId(idUser)
Descripción
Verifica la existencia un registro en la tabla “authentications”. Si el parámetro “idUser” coincide con el campo “id” retorna el campo “photo_url”.
Retorna
En caso de existir: Retorna un string con el valor de “photo”.
En caso de no existencia:
- Retorna null
Tablas a las que accede
authentications*/

		public function obtenerFotoXId($idUser) {
				$query="SELECT photo_url FROM authentications WHERE user_id='$idUser'  ";
		      $result = $this->ql->query($query); 		      		
		      if (!$result) return null;
		      if ($result->num_rows == 0) return null;
		      $row = $result->fetch_assoc();
		      return $row["photo_url"];
		    }



		/*Función
verificarBaseXMail(provider, identifier, pass)
Descripción
Verifica la existencia un registro en la tabla “authentications”. Si el parámetro “provider” es igual a “Email” Y si el campo “identifier” coincide con el campo “provider_uid” Y si el parámetro “pass” coincide con el campo “password”, Obtiene el campo “user_id”.
Retorna
En caso de existir: Retorna un int con el valor de “user_id”.
En caso de no existencia:
- Retorna 0
Tablas a las que accede
authentications
*/

	public function verificarBaseXMail($provider,$identifier,$pass) {
				$query="SELECT user_id FROM authentications WHERE provider='Email' and provider_uid = '$identifier' and password='$pass'  ";
		      $result = $this->ql->query($query); 		      		
		      if (!$result) return 0;
		      if ($result->num_rows == 0) return 0;
		      $row = $result->fetch_assoc();
		      return $row["user_id"];
		    }
		
		/*Función
existeUsuarioXId(idUser)
Descripción
Verifica la existencia un registro en la tabla “usuario”. Si el parámetro “idUsuario” coincide con el campo “id” retorna el ese registro de la tabla.
Retorna
En caso de existir: Retorna un registro de la tabla.
En caso de no existencia:
- Retorna null
Tablas a las que accede
usuario
*/
//A QUE REFIERE ESE REGISTRO
public function existeUsuarioXId($idUser) {
				$query="SELECT * FROM usuario WHERE id='$idUser'  ";
				$result = $this->ql->query($query); 		      		
		      if (!$result) return false;
		      if ($result->num_rows == 0) return false;
		      $row = $result->fetch_array();
		      return json_encode($row);
		    }
		
		/*Función
almacenarUsuario
Descripción
Recibe por $_POST:  nombreapellido, cedula, email, celular, genero, ciudad, provider, user_data.

user_data es un objeto en formato JSON que contiene los datos de redes sociales del usuario a ingresar: user_id, provider, provider_uid, email, password, display_name, first_name, last_name, profile_url, website_url,  photo_url, description.

La función verifica si user_data ya existe en la tabla authentications mediante. En caso no existir, inserta user data en los campos correspondientes, incluyendo el campo “created_at” que es la fecha/hora acutal en la que se creo el registro. Finalmente inserta nombreapellido, cedula, email, celular, genero, ciudad, en la tabla “usuario”.
Retorna
En caso de existir autenticación previa retorna 0
En caso de no existencia, se inserta y retorna el id del usuario nuevo ingresado.
Tablas a las que accede
authentications, usuario
*/
//NECESITO JSON EJEMPLO
public function almacenarUsuario($nombreapellido, $cedula, $email, $celular, $genero, $ciudad, $provider, $user_data) {
				
				//user_id, provider, provider_uid, email, password, display_name, first_name, last_name, profile_url, website_url,  photo_url, description
				$udata = json_decode($user_data);
					
								
				
					if( !isset($udata->identifier)  ){ return -1; }
					if( !isset($udata->photoURL) ){ return -2; }
					if( !isset($udata->displayName) ){ return -3; }
				
					if($this->verificarBase($provider,$udata->identifier) != 0  ){ return 0;}
				
				$sqlInsertUser="INSERT IGNORE INTO `usuario` (`id`, `nombres`, `cedula`, `email`, `celular`, `genero`, `ciudad`, `voltios`) 
				VALUES (NULL, '$nombreapellido', '$cedula', '$email', '$celular', '$genero', '$ciudad', '0');";	
				$this->ql->query($sqlInsertUser);
								
				$sqlGetUID = "SELECT id FROM usuario WHERE celular='$celular'"  ; 									
				$result_uid = $this->ql->query($sqlGetUID);		
				$row_uid = $result_uid->fetch_assoc();
				$idUser=$row_uid["id"];		
				
				$sqlInsertAuth="INSERT INTO `authentications` (`id`, `user_id`, `provider`, `provider_uid`, `email`, `password`, `display_name`, `first_name`, `last_name`, `profile_url`, `website_url`, `created_at`, `photo_url`, `description`) 
				VALUES (NULL, '$idUser', '$provider', '".$udata->identifier."', '$email', '', '".$udata->displayName."', '".$udata->firstName."', '".$udata->lastName."', '".$udata->profileURL."', '".$udata->webSiteURL."', now(), '".$udata->photoURL."', '".$udata->description."');				
				";

				$this->ql->query($sqlInsertAuth);	
				
				
											
				return 1;
				
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
 [zip] =>*/		
				
				
		    }
		

/*Nombre de la función
obtenerMedallas(id_usuario)
Descripción
Funcion que devuelve un array de medallas según el id de usuario que recibe como parámetro.


Consulta a la base de datos.
Tablas: usuario_medalla y medalla.
Query1
(consulta de las medallas acumuladas por el usuario)
$sqlMedallas = "
		SELECT *
		FROM usuario_medalla
		WHERE usuario_id=".$usuario."
		";
Query2
(Consulta las medallas por identificador de medalla para mostrar sus atributos)
$sqlMedallaMostrar = "
			SELECT *
			FROM medalla
			WHERE id=".$med_id."
			";
*/
		
		public function obtenerMedallas($idUser) {
				$query="SELECT * FROM usuario_medalla LEFT JOIN medalla ON medalla_id = medalla.id WHERE usuario_id='$idUser' ";
				$result = $this->ql->query($query); 		      		
		      if (!$result) return false;
		      if ($result->num_rows == 0) return false;
		      $ret = array();
		      while( $row = $result->fetch_array() ){
		      		$ret[] = $row;
		      		}
		      //return $ret;
		      return json_encode($ret);
		    }
		
		
		/*Nombre de la función
envio_correo_ganar_medalla($correo , $nombre_medalla)
Descripción
Funcion que envia un correo al usuario que gano una medalla, recibe como parametro el correo destinatario y el nombre de la medalla que ganó(oro, plata, cobre o bronce).
*/
		public function envio_correo_ganar_medalla($correo , $nombre_medalla) {
				$Name = "220v"; 
				$email = "220v@server.celmedia.info"; 
				$recipient = "$correo"; 
				$mail_body = "Ganaste la medalla de $nombre_medalla"; 
				$subject = "Ganaste la medalla de $nombre_medalla"; 
				$header = "From: ". $Name . " <" . $email . ">\r\n"; 
				
				mail($recipient, $subject, $mail_body, $header); //mail command :)
		      //return json_encode($ret);
			return 1;
		    }

/*Nombre
Consultar codigo por post
Descripción
*Se recibe por post el codigo, se verifica si existe en la base en la tabla “codigos” y si no ha sido canjeado (estado del código “no canjeado = 1”).
*Si no ha sido canjeado se hace un registro en la tabla “bitacora” al usuario que ingreso el código y su código, luego se setea/cambia el estado del código (estado =”1”).
*Se acumula los voltios o puntaje al usuario, en la tabla “usuario”
*Se verifica si obtuvo una medalla con los voltios acumulados del usuario y si gana medalla ejecuta la función envio_correo_ganar_medalla($correo , $nombre_medalla).
*Si el código fue canjeado (estado = “2”), se envía un mensaje al usuario (Código ya canjeado) con una variable flash en php.



Consulta a la base de datos.
Tablas: codigos, bitacora, configuracion, usuario,usuario_medalla
Query1
(Consulta de código)
$sqlCodigo = "
		SELECT *
		FROM codigos
		WHERE codigo='" . $codigo . "'
		";
Query2
(Registro de un código canjeado)
$sqlBitacora = "
		INSERT INTO   bitacora
		(estado, usuario_activo, fecha_activacion, valor_codigo)
		VALUES
		('$estado', '$id_user', '$fecha2', '$codigo_valido')
		";
Query3
(Código canjeado)
$sqlEstado = "
	           UPDATE codigos
		SET estado= '2'
		WHERE
		codigo ='" . $codigo_valido . "'
		";
Query4
(Consulta de valor de código)
$sqlConfig = "
		SELECT *
		FROM configuracion
		WHERE nombre_parametro='valor_codigo'
		";
Query5
(Acumulación de puntos)
$sqlVoltio = "
		UPDATE
		usuario
		SET voltios= ".$voltios_acumulados."
		WHERE
		id =" . $id_user . "
		";
Query6
(Registro de Medalla al usuario)
$sqlRegistro = " 
                      INSERT INTO usuario_medalla
                      (usuario_id, medalla_id) 
                      VALUES ('$id_user', '$id_medalla') ";
*/

			public function consultar_codigo_por_post($idUser,$codigo,$voltios=20) {
				$sqlCodigo = "
						SELECT *
						FROM codigos
						WHERE codigo='$codigo' and estado=1;
						";
				//echo 		$sqlCodigo;
				$result = $this->ql->query($sqlCodigo); 		      		
		      if (!$result) return 0;
		      if ($result->num_rows == 0) return 0;
		      
		      //CUAL DEBE SER EL VALOR DEL ESTADO?	      
		      $sqlBitacora = "
					INSERT INTO   bitacora
					(estado, usuario_activo, fecha_activacion, valor_codigo)
					VALUES
					(1, '$idUser', now(), '$codigo')
					";			
					
					
				$result = $this->ql->query($sqlBitacora);	
				
				//ACTUALIZAR ESTADO CODIGO
				$this->ql->query("  UPDATE codigos SET estado=2 WHERE codigo='$codigo'");	
				
				$sqlSumVoltios = "UPDATE									
									   usuario									
									   SET voltios = voltios + $voltios									
										WHERE									
										id ='$idUser'									
										";		
				$result = $this->ql->query($sqlSumVoltios);	
				
				//VERIFICAR SI GANA MEDALLA;				
				$sqlMedallasNoReclamadas = "SELECT * FROM (
    										SELECT medalla.*,usuario_medalla.usuario_id as umuid 
    										FROM medalla LEFT JOIN `usuario_medalla` 
    										ON medalla.id= usuario_medalla.medalla_id AND usuario_id='$idUser'  
    										WHERE medalla.voltios <= (
    											SELECT voltios FROM usuario WHERE usuario.id='$idUser')     
    										) 
    									as q where umuid IS NULL									
										";	
										
						
										
				$result = $this->ql->query($sqlMedallasNoReclamadas);							
						while( $row = $result->fetch_array() ){
							$this->ql->query("INSERT INTO `ws_test`.`usuario_medalla` (`id`, `usuario_id`, `medalla_id`) VALUES (NULL, '$idUser', '".$row["id"]."');");							
							
		      			//ENVIAR CORREO MEDALLA($idUser,$row["nombre"])
		      		
							$sqlGetUEmail = "SELECT email FROM usuario WHERE id='$idUser'"  ; 									
							$result_correo = $this->ql->query($sqlGetUEmail);
							
							
							 	
							while($row_correo = $result_correo->fetch_assoc()){
												
		      					//print_r($row);
		      					//print_r($row_correo);
		      					$this->envio_correo_ganar_medalla($row_correo["email"] , $row["nombre"]); 
									};
							
		      			
		      		}
		      	
		      	//*Si el código fue canjeado (estado = “2”), se envía un mensaje al usuario (Código ya canjeado) con una variable flash en php.
		      	return 1;
						
		    }
		
	/*
	
Hacer el canje de premios
*Se recibe por post el premio (voltios del premio, nombre del premio) y se envía un correo al usuario con estos datos y se cambia el valor de los voltios del usuario según el premio seleccionado.


Tabla: usuario
$sqlCanje = "
		UPDATE
		usuario
		SET voltios= ".$total_voltios."
		WHERE
		id =" . $ifbuser . "
		";
		
		
---UPDATE

Este proceso se realiza cuando el usuario tiene desactivado los premios en la página y aparecen en un lightbox un botón para realizar el canje, 
cuando el usuario da click en “canjear” automaticamente se envia por post el premio (id, voltios y nombre) y el identificador del usuario logueado.

Este proceso ejecuta dos querys.

Query 1: Este hace el cambio de los voltios acumulados del usuario (tabla usuario) luego de haber restado los voltios del premio a canjear, 
recibiendo el id del usuario y los voltios del premio.

$sqlCanje = "

   UPDATE

   usuario

SET voltios= ".$total_voltios."

WHERE

id =" . $ifbuser . "

";


Query 2:  Se realiza un registro del premio que canjeó el usuario en sesión, en la tabla usuario_premio recibiendo el id del usuario y el id del premio para guardar esta información como un historial.

$sqlRegistroCanje = "

  INSERT INTO   usuario_premio

                   	(usuario_id, premio_id)

              VALUES

                   	('$ifbuser, '$id_premio')

                   	";

Finalmente, se envía un correo al usuario con el nombre y voltios del premio que canjeo.		
		
		
---- NOTAS
Como es posible asignar voltios y premio sin que esten correlacionados, 
la funcion definida no recibe el id del premio	


La funcion se aplica enviando el id usuario y el id premio	
		
*/

				public function hacer_el_canje_de_premios($idUser,$idPremio) {
					
											
					
						$sqlCanje = "UPDATE									
									   usuario									
									   SET voltios = voltios - (SELECT COALESCE(sum(voltios), 0)  FROM premio WHERE premio.id='$idPremio')									
										WHERE									
										id ='$idUser'									
										";		
									
									
						//echo $sqlCanje ;
						$result = $this->ql->query($sqlCanje); 		      		
		     			if (!$result) return 0;
									
						$sqlRegistroCanje = "
							  INSERT INTO   usuario_premio						
							         (usuario_id, premio_id)
							  			VALUES
										('$idUser', '$idPremio')
										";	
										
						//echo $sqlRegistroCanje;
						$result = $this->ql->query($sqlRegistroCanje); 	
						if (!$result) return 0;
						
						///ENVIAR CORREO						
						
						return 1;			
					
				
						}
					
								
					


	}
