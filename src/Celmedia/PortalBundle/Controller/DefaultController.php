<?php

namespace Celmedia\PortalBundle\Controller;

use Celmedia\PortalBundle\Entity\Campana;
use Celmedia\PortalBundle\Entity\Mensaje;
use Celmedia\PortalBundle\Entity\ListaEnvios;
use Celmedia\PortalBundle\Entity\GrupoEnvio;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

    public function pruebaAction() {

        $excel = $this->get('os.excel');
        $excel->loadFile(__DIR__ . '/../../../../web' . '/uploads/excels/example.xls');
        $excel->setActiveSheet(0);
        echo "<pre>";
        print_r($excel->getSheetData());
        echo "</pre>";
        die();
        //
        //
        return $this->render('.html.twig');
    }

    public function landingAction() {


        return $this->render('CelmediaPortalBundle::landing.html.twig');
    }



    public function reportesAction()
    {
      $usuario = $this->get('security.context')->getToken()->getUser();
      $em = $this->getDoctrine()->getManager();
      $campanas = $em->getRepository('CelmediaPortalBundle:Campana')->findAll();      
      return $this->render('CelmediaPortalBundle:Plus:reportes.html.twig', array(
        "usuario" => $usuario,
        "campanas" => $campanas)
      );
  }

/**
 * Retornar mediante ajax en formato json el detalle para poder crear las graficas respecto a una campana
 * @param  [type] $id_campana [description]
 * @return [type]             [description]
 */
public function getReportDataAction(  $id_campana )
{

}



public function clientesPorGrupoAction($grupo) {
    $em = $this->getDoctrine()->getManager();
    $grupo = $em->getRepository('CelmediaPortalBundle:GrupoEnvio')->find($grupo);

    $clientes = $em->getRepository('CelmediaPortalBundle:Cliente')->findBy(array("grupos" => $grupo));


    return $this->render('CelmediaPortalBundle:Blocks:clientes_grupo.html.twig', array("grupo" => $grupo, "clientes" => $clientes));
}

public function clientesFormAction(Request $request) {
    $usuario = $this->get('security.context')->getToken()->getUser();
    $em = $this->getDoctrine()->getManager();

    $grupo = new GrupoEnvio();
    $form = $this->createFormBuilder($grupo)
    ->add("nombre", "text")
    ->add("tipo", "choice", array("choices" => array(
        1 => "Publico", 2 => "Privado"
        )
    ))->getForm();

    if ($request->isMethod("POST")) {
        $form->bind($request);

        if ($form->isValid()) {

            $grupo->setFechaCreacion(new \DateTime());
            $grupo->setEstado(1);
            $grupo->setDescipcion("");
            $grupo->setUsuario($usuario);
            $em->persist($grupo);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'mensaje', 'Grupo "' . $grupo->getNombre() . '" creado correctamente'
                );

            return $this->redirect($this->generateUrl('clientes'));
        }
    }
    return $this->render('CelmediaPortalBundle:Blocks:form.grupos.html.twig', array("formGrupo" => $form->createView()));
}

public function clientesAction() {
    $usuario = $this->get('security.context')->getToken()->getUser();
    $em = $this->getDoctrine()->getManager();
        // $grupos = $em->getRepository('CelmediaPortalBundle:GrupoEnvio')->findBy(array("usuario"=> $usuario));
    $grupos = $em->getRepository('CelmediaPortalBundle:GrupoEnvio')->findAll();
    return $this->render('CelmediaPortalBundle:Plus:clientes.html.twig', array("grupos" => $grupos)
        );
}

public function campanasAction() {
    $usuario = $this->get('security.context')->getToken()->getUser();
    $em = $this->getDoctrine()->getManager();
    $campanas = $em->getRepository('CelmediaPortalBundle:Campana')->findAll();
    return $this->render('CelmediaPortalBundle:Plus:campanas.html.twig', array(
        "usuario" => $usuario,
        "campanas" => $campanas)
    );
}

public function detalleCampanasAction($id_campana) {
    $em = $this->getDoctrine()->getManager();
    $campana = $em->getRepository('CelmediaPortalBundle:Campana')->find($id_campana);
    return $this->render('CelmediaPortalBundle:Blocks:campana.detalle.html.twig', array("campana" => $campana));
}


public function detalleReporteAction($id_campana) {
    $em = $this->getDoctrine()->getManager();
    $campana = $em->getRepository('CelmediaPortalBundle:Campana')->find($id_campana);
    $envios = $em->getRepository('CelmediaPortalBundle:ListaEnvios')->findBy(array("campana" => $id_campana));
    return $this->render('CelmediaPortalBundle:Blocks:reporte.detalle.html.twig', array(
        "campana" => $campana,
        "envios" => $envios
        ));
}


public function reporteDataAction( $id_campana )
{

    $genero = array();
    $em = $this->getDoctrine()->getManager();
    $envios = $em->getRepository('CelmediaPortalBundle:ListaEnvios')->findBy(array("campana" => $id_campana));



//**
//  data de los generos
//**    

    foreach ($envios as $row) {
        if ($row->getSexo()==1) {
            if (!isset($genero[0] )) {
                $genero[0] = array() ; 
                $genero[0]['label'] = "Masculino" ; 
                $genero[0]['data'] = 0 ; 
                
            }
            $genero[0]['data']++ ;
        }else{
            if (!isset($genero[1] )) {
                $genero[1] = array() ; 
                $genero[1]['label'] = "Femenino" ; 
                $genero[1]['data'] = 0 ; 
                
            }
            $genero[1]['data']++ ;
        }
    }


//**
//  data de las edades
//**    
    $edades = array();
    $indice = 0 ; 

    foreach ($envios as $row) {
        $encontrado = false; 


        for ($i=0; $i < count($edades); $i++) { 
            if(  $edades[$i]['label'] === $row->getEdad()   ){           
                $edades[$i]['data'] = $edades[$i]['data'] +1 ; 
                $encontrado =true ; 
            }
        }



        if(  !$encontrado ){
            $edades[ $indice  ] = array();
            $edades[$indice]['label'] = $row->getEdad() ; 
            $edades[$indice]['data'] =1 ;
            $indice++;                                 
        } 
        $encontrado =false ; 
    }


//**
//  data de las operadoras
//**    
    $indice =0;
    $operadoras =array();
    foreach ($envios as $row) {
        $encontrado = false; 


        for ($i=0; $i < count($operadoras); $i++) { 
            if(  $operadoras[$i]['label'] === $row->getOperadora()   ){           
                $operadoras[$i]['data'] = $operadoras[$i]['data'] +1 ; 
                $encontrado =true ; 
            }
        }

        if(  !$encontrado ){
            $operadoras[ $indice  ] = array();
            $operadoras[$indice]['label'] = $row->getOperadora() ; 
            $operadoras[$indice]['data'] =1 ;
            $indice++;                                 
        } 
        $encontrado =false ; 
    }




//**
//  data de las operadoras
//**    
    $indice =0;
    $efectividad =array();

    $efectividad[0]['label'] = "Enviados";
    $efectividad[0]['data'] =  count( $envios  ) ;

    $efectividad[1]['label'] = "Contestados";
    $efectividad[1]['data'] =  rand(0, count( $envios  ) );;


  
    $response = new Response(json_encode(array('genero' => $genero , 'edades'  => $edades , 'operadoras' => $operadoras , 'efectividad'  => $efectividad )));
    $response->headers->set('Content-Type', 'application/json');

    return $response;

}




public function loginAction() {
    return $this->render('CelmediaPortalBundle:Plus:login.html.twig');
}

public function indexAction() {
        // return $this->render('CelmediaPortalBundle:Pages:index.html.twig');
    return $this->render('CelmediaPortalBundle:Plus:index.html.twig');
}

public function setupAction() {
    return $this->render('CelmediaPortalBundle:Plus:setup.html.twig');
}

public function setup2Action() {
    return $this->render('CelmediaPortalBundle:Plus:setup_slider.html.twig');
}

public function previewAction() {
    return $this->render('CelmediaPortalBundle:Blocks:finalizar.html.twig');
}

public function tipoMensajeAction() {
    return $this->render('CelmediaPortalBundle:Blocks:tipoMensaje.html.twig');
}

public function targetBlockAction(Request $request) {

    $errores = array();
    $em = $this->getDoctrine()->getManager();
    $usuario = $this->get('security.context')->getToken()->getUser();
    $campana = $em->getRepository('CelmediaPortalBundle:Campana')->findOneBy(
        array("estado" => 1, "usuario" => $usuario->getUsername())
        );

    if (!$campana)
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
    ->add('fechaCumpleanos', 'datetime', array("widget" => "single_text", 'format' => 'MM/dd/yyyy',)
        )
    ->add('save', 'submit')
    ->getForm();

    if ($request->isMethod('POST')) {

        $formulario->bind($request);

        if ($formulario->isValid()) {
            $campana->setEstado(1);
            $campana->setFechaCreacion(new \DateTime());
            $campana->setUsuario($usuario);

            $em->persist($campana);
            $em->flush();

            return $this->render('CelmediaPortalBundle:Blocks:target.html.twig', array("form" => $formulario->createView(), "completado" => true, "errores" => $errores));
        } else {


            $errores = $formulario->getErrors();

        }
    }


    return $this->render('CelmediaPortalBundle:Blocks:target.html.twig', array("form" => $formulario->createView(), "errores" => $errores, "completado" => false));
}

public function componerMensajeAction() {
    return $this->render('CelmediaPortalBundle:Pages:componerMensaje.html.twig');
}

public function mensajeAction(Request $request) {

    $em = $this->getDoctrine()->getManager();
    $usuario = $this->get('security.context')->getToken()->getUser();
    $campana = $em->getRepository('CelmediaPortalBundle:Campana')->findOneBy(
        array("estado" => 1, "usuario" => $usuario)
        );

    if (!$campana) {
        $campana = new Campana();
    }

    $mensaje = $campana->getMensaje();
    if (!$mensaje) {
        $mensaje = new Mensaje();
    }

    $form = $this->createFormBuilder($mensaje)
    ->add('fechaEnvio', 'datetime', array("widget" => "single_text", 'format' => 'MM/dd/yyyy',)
        )
    ->add('cantidadMensajes', 'number')
    ->add('contenidoMensaje', 'textarea')
    ->add('save', 'submit')
    ->getForm();

    if ($request->isMethod('POST')) {

        $form->bind($request);

        if ($form->isValid()) {
            $mensaje->setTipoMensaje(1);
            $mensaje->setFechaCreacion(new \DateTime());

            $campana->setMensaje($mensaje);
            $em->persist($campana);
            $em->flush();


            return $this->render('CelmediaPortalBundle:Blocks:mensaje.html.twig', array(
                "form" => $form->createView(), "completado" => true ,  "campana" => $campana 
                )
            );
        }
    }

    return $this->render('CelmediaPortalBundle:Blocks:mensaje.html.twig', array("campana" => $campana ,   "form" => $form->createView(), "completado" => false));
}






public function emailAction(Request $request) {

    $em = $this->getDoctrine()->getManager();
    $usuario = $this->get('security.context')->getToken()->getUser();
    $campana = $em->getRepository('CelmediaPortalBundle:Campana')->findOneBy(
        array("estado" => 1, "usuario" => $usuario)
        );



    if (!$campana) {
        $campana = new Campana();
    }

    $mensaje = $campana->getMensaje();
    if (!$mensaje) {
        $mensaje = new Mensaje();
    }

    $form = $this->createFormBuilder($mensaje)
    ->add('fechaEnvio', 'datetime', array("widget" => "single_text", 'format' => 'MM/dd/yyyy',)
        )
    ->add('nombre', 'text', array("required" => true))
    ->add('cantidadMensajes', 'number')
    ->add('contenidoMensaje', 'textarea')
    ->add('save', 'submit')
    ->getForm();

    if ($request->isMethod('POST')) {

        $form->bind($request);

        if ($form->isValid()) {
            $mensaje->setTipoMensaje(3);
            $mensaje->setFechaCreacion(new \DateTime());

            $campana->setMensaje($mensaje);
            $em->persist($campana);
            $em->flush();

            return $this->render('CelmediaPortalBundle:Blocks:email.html.twig', array(
                "form" => $form->createView(), "completado" => true ,"campana" => $campana 
                )
            );
        }
    }

    return $this->render('CelmediaPortalBundle:Blocks:email.html.twig', array("campana" => $campana ,   "form" => $form->createView(), "completado" => false));
}








public function emailTarjetaAction(Request $request) {


    $em = $this->getDoctrine()->getManager();
    $usuario = $this->get('security.context')->getToken()->getUser();
    $campana = $em->getRepository('CelmediaPortalBundle:Campana')->findOneBy(
        array("estado" => 1, "usuario" => $usuario)
        );


    if (!$campana) {
        $campana = new Campana();
    }

    $mensaje = $campana->getMensaje();
    if (!$mensaje) {
        $mensaje = new Mensaje();
    }



    $form = $this->createFormBuilder($mensaje)
    ->add('fechaEnvio', 'datetime', array("widget" => "single_text", 'data' => new \DateTime(), 'format' => 'MM/dd/yyyy',)
        )
    ->add('nombre', 'text', array('required' => true ))
    ->add('contenidoMensaje', 'hidden')
    ->add('cantidadMensajes', 'number')
    ->add('fechaIncio', 'datetime', array("widget" => "single_text", 'data' => new \DateTime(), 'format' => 'MM/dd/yyyy',)
        )
    ->add('fechaFin', 'datetime', array(
        "widget" => "single_text", 'data' => new \DateTime(), 'format' => 'MM/dd/yyyy',)
    )
    ->add('tipo_tarjeta', 'entity', array(
        'class' => 'CelmediaPortalBundle:TipoTarjeta'
        ))
    ->add('save', 'submit')
    ->getForm();

    if ($request->isMethod('POST')) {

        $form->bind($request);


        if ($form->isValid()) {
            $mensaje->setTipoMensaje(4);
            $mensaje->setFechaCreacion(new \DateTime());
            $mensaje->setContenidoMensaje( "http://server.celmedia.info/Portal/web/uploads/tiposTarjetas/" . $mensaje->getTipoTarjeta()->getImagen() ); 
            
            $campana->setMensaje($mensaje);


            $em->persist($campana);
                // $em->persist(  $mensaje );
            $em->flush();
            return $this->render('CelmediaPortalBundle:Blocks:email.tarjeta.html.twig', array(
                "campana" => $campana ,   
                "formulario" => $form->createView(), "completado" => true
                )
            );
        }else{
            print_r($form->getErrors());
            echo "Error ";
        }
    }

    return $this->render('CelmediaPortalBundle:Blocks:email.tarjeta.html.twig', array( "campana" => $campana ,      "formulario" => $form->createView(), "completado" => false));
}




public function tarjetaAction(Request $request) {


    $em = $this->getDoctrine()->getManager();
    $usuario = $this->get('security.context')->getToken()->getUser();
    $campana = $em->getRepository('CelmediaPortalBundle:Campana')->findOneBy(
        array("estado" => 1, "usuario" => $usuario)
        );


    if (!$campana) {
        $campana = new Campana();
    }

    $mensaje = $campana->getMensaje();
    if (!$mensaje) {
        $mensaje = new Mensaje();
    }



    $form = $this->createFormBuilder($mensaje)
    ->add('fechaEnvio', 'datetime', array("widget" => "single_text", 'data' => new \DateTime(), 'format' => 'MM/dd/yyyy',)
        )
    ->add('contenidoMensaje', 'hidden')
    ->add('cantidadMensajes', 'number')
    ->add('fechaIncio', 'datetime', array("widget" => "single_text", 'data' => new \DateTime(), 'format' => 'MM/dd/yyyy',)
        )
    ->add('fechaFin', 'datetime', array(
        "widget" => "single_text", 'data' => new \DateTime(), 'format' => 'MM/dd/yyyy',)
    )
    ->add('tipo_tarjeta', 'entity', array(
        'class' => 'CelmediaPortalBundle:TipoTarjeta'
        ))
    ->add('save', 'submit')
    ->getForm();

    if ($request->isMethod('POST')) {

        $form->bind($request);


        if ($form->isValid()) {
            $mensaje->setTipoMensaje(2);
            $mensaje->setFechaCreacion(new \DateTime());
            $mensaje->setContenidoMensaje( "http://server.celmedia.info/Portal/web/uploads/tiposTarjetas/" . $mensaje->getTipoTarjeta()->getImagen() ); 
            
            $campana->setMensaje($mensaje);


            $em->persist($campana);
                // $em->persist(  $mensaje );
            $em->flush();
            return $this->render('CelmediaPortalBundle:Blocks:tarjeta.html.twig', array(
                "formulario" => $form->createView(), "completado" => true ,  "campana" => $campana 
                )
            );
        }else{
            print_r($form->getErrors());
            echo "Error ";
        }
    }

    return $this->render('CelmediaPortalBundle:Blocks:tarjeta.html.twig', array( "campana" => $campana ,      "formulario" => $form->createView(), "completado" => false));
}










public function resumenAction() {

    $em = $this->getDoctrine()->getManager();
    $usuario = $this->get('security.context')->getToken()->getUser();
    $campana = $em->getRepository('CelmediaPortalBundle:Campana')->findOneBy(
        array("estado" => 1, "usuario" => $usuario)
        );

    if (!$campana) {
        $campana = new Campana();
    }



    return $this->render('CelmediaPortalBundle:Blocks:resumen.html.twig', array("campana" => $campana));
}

public function finalizarAction() {

    $em = $this->getDoctrine()->getManager();
    $usuario = $this->get('security.context')->getToken()->getUser();
    $campana = $em->getRepository('CelmediaPortalBundle:Campana')->findOneBy(
        array("estado" => 1, "usuario" => $usuario)
        );


    if (!$campana) {
        $campana = new Campana();
    }


    $clientes = $em->getRepository('CelmediaPortalBundle:Cliente')->findAll();


    foreach ($clientes as $cliente) {
        $envio = new ListaEnvios();
        $envio->setNumero($cliente->getTelefono());
        $envio->setCampana($campana->getId());
        $envio->setEstado(0);
        $envio->setTituloMensaje("");
        $envio->setUrl("http://server.celmedia.info/granjasms/?numeros=" . $cliente->getTelefono() . "&operadoras=mov&texto=" . urlencode( $campana->getMensaje()->getContenidoMensaje() ) . "&usuario=celmedia&passwd=cerebro");
        

        if(   $campana->getMensaje()->getTipoMensaje() < 3   ){
            $envio->setTipoMensaje('sms');
        }else{
            $envio->setTipoMensaje('email');
            $envio->setTituloMensaje(  $campana->getMensaje()->getNombre() );
            $envio->setUrl($campana->getMensaje()->getContenidoMensaje());
        }

        $envio->setSexo(  $cliente->getSexo()  );
        $envio->setEdad(  $cliente->getEdad()  );
        $envio->setNombre(  $cliente->getNombre()  );
        $envio->setOperadora(  $cliente->getOperadora()  );
        $envio->setUsuarioCreador(  $usuario->getId()  );
        $envio->setIdCliente(  $cliente->getId()  );
        $envio->setCiudad($cliente->getNacionalidad());

        $em->persist($envio);
        $em->flush();
    }

    $campana->setEstado(2);
    $em->persist($campana);
    $em->flush();

    return $this->redirect($this->generateUrl('portal_home'));
}

public function sendsmsAction() {
    $em = $this->getDoctrine()->getManager();
    //ENVIO SMS
    $query = $em->createQuery(
        "SELECT p.id,p.url FROM CelmediaPortalBundle:ListaEnvios p WHERE p.estado=0 and p.tipo_mensaje='sms' "
        );

    $products = $query->getResult();

    foreach ($products as $p) {
           
        $ret = self::fetch($p["url"]);
        echo $ret;

        if ($ret == 1) {
            $estado = 1;
        } else {
            $estado = 2;
        }

        $q = 'UPDATE  CelmediaPortalBundle:ListaEnvios p SET p.estado=' . $estado . ' WHERE p.id=' . $p['id'];
            //echo $q;

        $query = $em->createQuery($q);
        $query->getResult();
    }
    //ENVIO EMAIL
    $query = $em->createQuery(
        "SELECT p.id,p.url,p.titulo_mensaje,q.correo FROM CelmediaPortalBundle:ListaEnvios p , CelmediaPortalBundle:Cliente q WHERE p.id_cliente = q.id and p.estado=0 and p.tipo_mensaje='email' "
        );

    $products = $query->getResult();

    foreach ($products as $p) {
         
	$z = array();
	$z["post"] = "";
	$post["to"] = $p["correo"];
	$post["from"] = "220V@server.celmedia.info";
	$post["title"] = $p["titulo_mensaje"];
	$post["text"] = $p["url"];
  
        $url = 'http://server.celmedia.info/Portal/web/sendmail?';
	//$z["post"] .= implode('&', array_map('self::urlify', array_keys($post), $post));
	$z["post"] .= implode('&', array_map(function($key, $val) {
		    return urlencode($key) . '=' . urlencode($val);
		  },
		  array_keys($post), $post)
		);

	self::fetch($url,$z);

	$estado = 1;
        $q = 'UPDATE  CelmediaPortalBundle:ListaEnvios p SET p.estado=' . $estado . ' WHERE p.id=' . $p['id'];
            //echo $q;

        $query = $em->createQuery($q);
        $query->getResult();
    }


    return new Response('<html><body></body></html>');
}

public function sendmailAction() {
    
	$to = $this->get('request')->request->get('to');
	$from = $this->get('request')->request->get('from');
	$title = $this->get('request')->request->get('title');
	$text = $this->get('request')->request->get('text');

	
	$para      = "$to";
	$titulo = "$title";
	$mensaje = "$text";
	$cabeceras = "From: $from" . "\r\n" .
	    'Reply-To: webmaster@example.com' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	mail($to, $titulo, $mensaje, $cabeceras);

    return new Response('<html><body></body></html>');
}

public function mailsampleAction() {
    	$z = array();
	$z["post"] = "";
	$post["to"] = "seyacat@gmail.com";
	$post["from"] = "220V@server.celmedia.info";
	$post["title"] = "Mail de Prueba";
	$post["text"] = "Mail de Prueba
		OK";

	$url = 'http://server.celmedia.info/Portal/web/sendmail?';
	//$z["post"] .= implode('&', array_map('self::urlify', array_keys($post), $post));
	$z["post"] .= implode('&', array_map(function($key, $val) {
		    return urlencode($key) . '=' . urlencode($val);
		  },
		  array_keys($post), $post)
		);

	self::fetch($url,$z);

    return new Response('<html><body></body></html>');
}

function urlify($key, $val) {
  //return urlencode($key) . '=' . urlencode($val);
}



function fetch($url, $z = null) {
    $ch = curl_init();

    $useragent = isset($z['useragent']) ? $z['useragent'] : 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:10.0.2) Gecko/20100101 Firefox/10.0.2';

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POST, isset($z['post']));

    if (isset($z['post']))
        curl_setopt($ch, CURLOPT_POSTFIELDS, $z['post']);
    if (isset($z['refer']))
        curl_setopt($ch, CURLOPT_REFERER, $z['refer']);

    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, ( isset($z['timeout']) ? $z['timeout'] : 5));
        //curl_setopt( $ch, CURLOPT_COOKIEJAR,  $z['cookiefile'] );
        //curl_setopt( $ch, CURLOPT_COOKIEFILE, $z['cookiefile'] );

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function getImageAction($id_promocion) {
        //prepare the response, e.g.
    $em = $this->getDoctrine()->getManager();
    $promocion = $em->getRepository("CelmediaPortalBundle:TipoTarjeta")->find($id_promocion);

    $url ='../uploads/tiposTarjetas/' ;

    $img_url = $url  . $promocion->getImagen();

    $data = array("code" => 100, "success" => true, "imagen" => $promocion->getImagen());
        //you can return result as JSON
    $response = new Response(json_encode($data));
    $response->headers->set('Content-Type', 'application/json');
    return $response;
}

}
