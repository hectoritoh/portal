<?php

namespace Celmedia\AdminThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Celmedia\PortalBundle\Entity\Campana;
use Celmedia\PortalBundle\Entity\Mensaje;

class DefaultController extends Controller
{
	public function indexAction()
	{
		return $this->render('CelmediaAdminThemeBundle:Pages:index.html.twig');
	}


	public function participantesAction()
	{
		$em = $this->getDoctrine()->getManager();
		$participantes = $em->getRepository('CelmediaCrmCanjeadorCodigosBundle:Participante')->findAll();
		return $this->render('CelmediaAdminThemeBundle:Pages:participantes.html.twig' , array("participantes" => $participantes));
	}


	public function aplicacionesAction()
	{
		$em = $this->getDoctrine()->getManager();
		$aplicaciones = $em->getRepository('CelmediaCrmCanjeadorCodigosBundle:Aplicacion')->findAll();
		return $this->render('CelmediaAdminThemeBundle:Pages:aplicaciones.html.twig' , array("aplicaciones" => $aplicaciones));
	}

	public function codigosAction()
	{
		$em    = $this->get('doctrine.orm.entity_manager');
		$dql   = "SELECT a FROM CelmediaCrmCanjeadorCodigosBundle:Codigo a";
		$query = $em->createQuery($dql);

		$paginator  = $this->get('knp_paginator');
		$pagination = $paginator->paginate(
			$query,
			$this->get('request')->query->get('page', 1)/*page number*/,
			30/*limit per page*/
			);
		return $this->render('CelmediaAdminThemeBundle:Pages:codigos.html.twig' , array("pagination" => $pagination));

	}



	public function enviosAction( Request $request )
	{

		
		$em = $this->getDoctrine()->getManager();
		$usuario = $this->get('security.context')->getToken()->getUser();
	 
		$campana = new Campana();

		$edades = array();
		for ($i = 12; $i < 60; $i++) {
			$edades[$i] = $i;
		}

		$edadesMax = array();
		$edadesMax[60] = "Sin maximo";
		for ($i = 13; $i < 59; $i++) {
			$edadesMax[$i] = $i;
		}

		$formulario = $this->createFormBuilder($campana)
		->add('nombre', 'text', array("required" => true))
		->add('ciudades', 'entity', array(
			'class' => 'CelmediaPortalBundle:Ciudad',
			'multiple' => true,
			"required" => true
			))
		->add('edadMinima', 'choice', array(
			'choices' => $edades)
		)
		->add('edadMaxima', 'choice', array(
			'choices' => $edadesMax))
		->add('genero', 'choice', array(
			"required" => true,
			'choices' => array(
				'0' => 'Todos',
				'1' => 'Hombres',
				'2' => 'Mujeres',
				)
			))
		->add('fechaCumpleanos', 'datetime', array("widget" => "single_text", 'format' => 'MM/dd/yyyy',))
		->add('save', 'submit')
		->getForm();

		if ($request->isMethod('POST')) {

			$formulario->bind($request);

			if ($formulario->isValid()) {
				$campana->setEstado(1);				
				$campana->setUsuario($usuario->getUsername());
				$em->persist($campana);
				$em->flush();
			}  
		}

		return $this->render('CelmediaAdminThemeBundle:Pages:configuracion.envios.html.twig'  , array( "formulario" => $formulario->createView()  ));
	}


	



public function getTipoMensajeFormAction($id_tipo ) {

	$request =  $this->getRequest();
    $em = $this->getDoctrine()->getManager();

 
    $usuario = $this->get('security.context')->getToken()->getUser();

    $mensaje = new Mensaje();
     
   	$mensaje->setTipoMensaje($id_tipo);

   $form = $this->createFormBuilder($mensaje);
    $form->add('fechaEnvio', 'datetime', array("widget" => "single_text", 'data' => new \DateTime(), 'format' => 'MM/dd/yyyy',)
        );
    $form->add('nombre', 'text', array('required' => true ));
    $form->add('contenidoMensaje', 'textarea');
    $form->add('cantidadMensajes', 'number');
    $form->add('fechaIncio', 'datetime', array("widget" => "single_text", 'data' => new \DateTime(), 'format' => 'MM/dd/yyyy',)
        );
    $form->add('fechaFin', 'datetime', array(
        "widget" => "single_text", 'data' => new \DateTime(), 'format' => 'MM/dd/yyyy',)
    );
    $form->add('tipo_tarjeta', 'entity', array(
        'class' => 'CelmediaPortalBundle:TipoTarjeta'
        ));
    $form->add('save', 'submit');
    $form = $form->getForm();


    if ($request->isMethod('POST')) {

        $form->bind($request);

        if ($form->isValid()) {
            $mensaje->setTipoMensaje($id_tipo);
            $mensaje->setFechaCreacion(new \DateTime());

            $campana->setMensaje($mensaje);
            $em->persist($campana);
            $em->flush();

            
        }
    }

    return $this->render('CelmediaAdminThemeBundle:Blocks:form.tipo_mensaje.html.twig', array(
                "formulario" => $form->createView()
                )
            );
}


public function getMensajeImagenFormAction($id_tipo ) {

	$em = $this->getDoctrine()->getManager();
	$usuario = $this->get('security.context')->getToken()->getUser();

	$tipo_tarjeta = $em->getRepository('CelmediaPortalBundle:TipoTarjeta')->find( $id_tipo );
 	 
 	return $this->render('CelmediaAdminThemeBundle:Blocks:tipo_mensaje.image.html.twig', array("tipo_tarjeta"  => $tipo_tarjeta ));
}




}
