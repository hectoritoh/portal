<?php

namespace Celmedia\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListaEnvios
 */
class ListaEnvios
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $numero;

    /**
     * @var string
     */
    private $campana;

    /**
     * @var string
     */
    private $url;

    /**
     * @var integer
     */
    private $estado;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numero
     *
     * @param string $numero
     * @return ListaEnvios
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set campana
     *
     * @param string $campana
     * @return ListaEnvios
     */
    public function setCampana($campana)
    {
        $this->campana = $campana;
    
        return $this;
    }

    /**
     * Get campana
     *
     * @return string 
     */
    public function getCampana()
    {
        return $this->campana;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return ListaEnvios
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return ListaEnvios
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }
    /**
     * @var integer
     */
    private $id_cliente;

    /**
     * @var integer
     */
    private $sexo;

    /**
     * @var integer
     */
    private $operadora;

    /**
     * @var integer
     */
    private $edad;

    /**
     * @var integer
     */
    private $usuario_creador;


    /**
     * Set id_cliente
     *
     * @param integer $idCliente
     * @return ListaEnvios
     */
    public function setIdCliente($idCliente)
    {
        $this->id_cliente = $idCliente;
    
        return $this;
    }

    /**
     * Get id_cliente
     *
     * @return integer 
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * Set sexo
     *
     * @param integer $sexo
     * @return ListaEnvios
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    
        return $this;
    }

    /**
     * Get sexo
     *
     * @return integer 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set operadora
     *
     * @param integer $operadora
     * @return ListaEnvios
     */
    public function setOperadora($operadora)
    {
        $this->operadora = $operadora;
    
        return $this;
    }

    /**
     * Get operadora
     *
     * @return integer 
     */
    public function getOperadora()
    {
        return $this->operadora;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     * @return ListaEnvios
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;
    
        return $this;
    }

    /**
     * Get edad
     *
     * @return integer 
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set usuario_creador
     *
     * @param integer $usuarioCreador
     * @return ListaEnvios
     */
    public function setUsuarioCreador($usuarioCreador)
    {
        $this->usuario_creador = $usuarioCreador;
    
        return $this;
    }

    /**
     * Get usuario_creador
     *
     * @return integer 
     */
    public function getUsuarioCreador()
    {
        return $this->usuario_creador;
    }
    /**
     * @var integer
     */
    private $ciudad;


    /**
     * Set ciudad
     *
     * @param integer $ciudad
     * @return ListaEnvios
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    
        return $this;
    }

    /**
     * Get ciudad
     *
     * @return integer 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }
    /**
     * @var string
     */
    private $nombre;


    /**
     * Set nombre
     *
     * @param string $nombre
     * @return ListaEnvios
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    /**
     * @var string
     */
    private $tipo_mensaje;

    /**
     * @var string
     */
    private $titulo_mensaje;


    /**
     * Set tipo_mensaje
     *
     * @param string $tipoMensaje
     * @return ListaEnvios
     */
    public function setTipoMensaje($tipoMensaje)
    {
        $this->tipo_mensaje = $tipoMensaje;
    
        return $this;
    }

    /**
     * Get tipo_mensaje
     *
     * @return string 
     */
    public function getTipoMensaje()
    {
        return $this->tipo_mensaje;
    }

    /**
     * Set titulo_mensaje
     *
     * @param string $tituloMensaje
     * @return ListaEnvios
     */
    public function setTituloMensaje($tituloMensaje)
    {
        $this->titulo_mensaje = $tituloMensaje;
    
        return $this;
    }

    /**
     * Get titulo_mensaje
     *
     * @return string 
     */
    public function getTituloMensaje()
    {
        return $this->titulo_mensaje;
    }
}