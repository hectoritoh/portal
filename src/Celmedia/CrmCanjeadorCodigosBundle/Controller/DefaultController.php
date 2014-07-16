<?php

namespace Celmedia\CrmCanjeadorCodigosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;
use Symfony\Component\DependencyInjection\ContainerAware;




class DefaultController extends Controller
{

 	/**
     * @Soap\Method("ingresar_participante")
     * @Soap\Param("id_facebook", phpType = "string")
     * @Soap\Param("telefono", phpType = "string")
     * @Soap\Param("correo", phpType = "string")
     * @Soap\Param("nombres", phpType = "string")
     * @Soap\Param("aplicacion", phpType = "string")
     * @Soap\Result(phpType = "string[]")
     */
 	public function ingresarparticipanteAction(  $id_facebook , $telefono , $correo , $nombres , $aplicacion  )
 	{

 		$response = array() ; 


		if (!is_numeric($telefono)  ||  !is_numeric($aplicacion)  ) { 			
 			$response[] = -1 ; 
 			$response[] = "error en los parametros enviados" ;
 			return $response;  
 		}

 		if (   strlen($telefono) != 10 ) {
 			$response[] = -1 ; 
 			$response[] = "numero de telefono invalido" ;
 			return $response; 
 		}





 		$em = $this->getDoctrine()->getManager();

 		$participante = $em->getRepository('CelmediaCrmCanjeadorCodigosBundle:Participante')->findOneBy(  array("telefono" => $telefono ) );

 		if ( $participante) {
 			$response[] = 0 ; 
 			$response[] = "El numero de telefono ya se encuentra registrado" ; 
 			
 		}else{

 			try {

 				$participante = new \Celmedia\CrmCanjeadorCodigosBundle\Entity\Participante(); 
 				$participante->setIdFacebook( $id_facebook ); 
 				$participante->setEmail("correo"); 
 				$participante->setTelefono( $telefono ); 
 				$participante->setNombres('usuario'); 
 				$participante->setPuntaje(0); 
 				$participante->setBorrado(0); 

 				$em->persist(  $participante );
 				$em->flush(); 

 				$response[] = 1 ; 
 				$response[] = "usuario registrado correctamente" ; 
 				$response[] = $participante->getPuntaje() ; 

 			} catch (Exception $e) {
 				$response[] = -1 ; 
 				$response[] =  $e->getMessage()  ; 
 			}
 		}

 		return $response;
 		
 	}






 	/**
     * @Soap\Method("obtener_participante")
     * @Soap\Param("telefono", phpType = "string")
     * @Soap\Param("aplicacion", phpType = "string")
     * @Soap\Result(phpType = "string[]")
     */
 	public function getParticipanteAction(  $telefono  , $aplicacion  )
 	{

 		$response = array() ; 

 		// if (  NaN($telefono)  ||  !is_numeric($aplicacion)  ) { 			
 		// 	$response[] = -1 ; 
 		// 	$response[] = "error en los parametros enviados" ;
 		// 	return $response;  
 		// }

 		if (   strlen($telefono) != 10 ) {
 			$response[] = -1 ; 
 			$response[] = "numero de telefono invalido" ;
 			return $response; 
 		}



 		$em = $this->getDoctrine()->getManager();

 		$participante = $em->getRepository('CelmediaCrmCanjeadorCodigosBundle:Participante')->findOneBy(  array("telefono" => $telefono ) );

 		if ( !$participante) {
 			$response[] = 0 ; 
 			$response[] = "El usuario no existe" ; 
 			
 		}else{

 			$response[] = 1 ; 
 			$response[] = "consulta generada corectamente" ; 
 			$response[] = $participante->getPuntaje() ; 
 		}

 		return $response;
 		
 	}




 	/**
     * @Soap\Method("canjear_codigo")
     * @Soap\Param("telefono", phpType = "string")
     * @Soap\Param("codigo", phpType = "string")
     * @Soap\Param("aplicacion", phpType = "string")
     * @Soap\Result(phpType = "string[]")
     */
 	public function canjearCodigoAction(  $telefono , $codigo  , $aplicacion  )
 	{


 		$response = array() ; 
 		
 		$em = $this->getDoctrine()->getManager();

 		$codigo = $em->getRepository('CelmediaCrmCanjeadorCodigosBundle:Codigo')->findOneBy(  array("valor" => $codigo ) );
 		$participante = $em->getRepository('CelmediaCrmCanjeadorCodigosBundle:Participante')->findOneBy(  array("telefono" => $telefono ) );


 		if (!$participante) {
 			$response[] = 0 ; 
 			$response[] = "El Participante no esta registrado" ; 
 			return $response; 
 		}

 		if ( !$codigo) {
 			$response[] = 0 ; 
 			$response[] = "El codigo no existe" ; 
 			return $response; 
 		}

 		if ( $codigo->getEstado() === 0 ) {
 			$response[] = 0 ; 
 			$response[] = "El codigo ya ha sido canjeado" ; 
 			return $response; 	
 		}


 		try {
 			
 			$codigo->setEstado(0);
 			$participante->addCodigosCanjeado(  $codigo );
 			$participante->setPuntaje(  $participante->getPuntaje()  + $codigo->getPuntos()  ); 
 			$em->flush();

 			$response[] = 1 ; 
 			$response[] = "Puntos asignados a usuario correctamente" ; 


 		} catch (Exception $e) {
 			$response[] = -1 ; 
 			$response[] = "Error al asignar los puntos , favor volver a intentarlo en unos momentos" ; 

 		}


 		return $response;
 		
 	}


 }
