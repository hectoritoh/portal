<?php 

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BeSimple\SoapBundle\ServiceDefinition\Annotation as Soap;
use Symfony\Component\DependencyInjection\ContainerAware;


class ServiciosController extends ContainerAware
{

	 
   
    public function indexAction()
    {
        $server = new \SoapServer('/path/to/hello.wsdl');
        $server->setObject($this->get('hello_service'));

        $response = new Response();
        $response->headers->set('Content-Type', 'text/xml; charset=ISO-8859-1');

        ob_start();
        $server->handle();
        $response->setContent(ob_get_clean());

        return $response;
    }

}



 ?>