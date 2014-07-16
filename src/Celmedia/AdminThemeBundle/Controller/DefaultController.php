<?php

namespace Celmedia\AdminThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

}
