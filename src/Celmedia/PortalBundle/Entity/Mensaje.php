<?php

namespace Celmedia\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mensaje
 */
class Mensaje
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $tipoMensaje;

    /**
     * @var \DateTime
     */
    private $fechaEnvio;

    /**
     * @var integer
     */
    private $cantidadMensajes;

    /**
     * @var string
     */
    private $contenidoMensaje;

    /**
     * @var string
     */
    private $tipoTarjeta;

    /**
     * @var \DateTime
     */
    private $fechaIncio;

    /**
     * @var \DateTime
     */
    private $fechaFin;

    /**
     * @var \DateTime
     */
    private $fechaCreacion;

    /**
     * @var \DateTime
     */
    private $fechaCumpleanios;

    /**
     * @var \Celmedia\PortalBundle\Entity\TipoTarjeta
     */
    private $tipo_tarjeta;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Mensaje
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
     * Set tipoMensaje
     *
     * @param string $tipoMensaje
     * @return Mensaje
     */
    public function setTipoMensaje($tipoMensaje)
    {
        $this->tipoMensaje = $tipoMensaje;
    
        return $this;
    }

    /**
     * Get tipoMensaje
     *
     * @return string 
     */
    public function getTipoMensaje()
    {
        return $this->tipoMensaje;
    }

    /**
     * Set fechaEnvio
     *
     * @param \DateTime $fechaEnvio
     * @return Mensaje
     */
    public function setFechaEnvio($fechaEnvio)
    {
        $this->fechaEnvio = $fechaEnvio;
    
        return $this;
    }

    /**
     * Get fechaEnvio
     *
     * @return \DateTime 
     */
    public function getFechaEnvio()
    {
        return $this->fechaEnvio;
    }

    /**
     * Set cantidadMensajes
     *
     * @param integer $cantidadMensajes
     * @return Mensaje
     */
    public function setCantidadMensajes($cantidadMensajes)
    {
        $this->cantidadMensajes = $cantidadMensajes;
    
        return $this;
    }

    /**
     * Get cantidadMensajes
     *
     * @return integer 
     */
    public function getCantidadMensajes()
    {
        return $this->cantidadMensajes;
    }

    /**
     * Set contenidoMensaje
     *
     * @param string $contenidoMensaje
     * @return Mensaje
     */
    public function setContenidoMensaje($contenidoMensaje)
    {
        $this->contenidoMensaje = $contenidoMensaje;
    
        return $this;
    }

    /**
     * Get contenidoMensaje
     *
     * @return string 
     */
    public function getContenidoMensaje()
    {
        return $this->contenidoMensaje;
    }

    /**
     * Set tipoTarjeta
     *
     * @param string $tipoTarjeta
     * @return Mensaje
     */
    public function setTipoTarjeta($tipoTarjeta)
    {
        $this->tipoTarjeta = $tipoTarjeta;
    
        return $this;
    }

    /**
     * Get tipoTarjeta
     *
     * @return string 
     */
    public function getTipoTarjeta()
    {
        return $this->tipoTarjeta;
    }

    /**
     * Set fechaIncio
     *
     * @param \DateTime $fechaIncio
     * @return Mensaje
     */
    public function setFechaIncio($fechaIncio)
    {
        $this->fechaIncio = $fechaIncio;
    
        return $this;
    }

    /**
     * Get fechaIncio
     *
     * @return \DateTime 
     */
    public function getFechaIncio()
    {
        return $this->fechaIncio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Mensaje
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    
        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return Mensaje
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    
        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime 
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set fechaCumpleanios
     *
     * @param \DateTime $fechaCumpleanios
     * @return Mensaje
     */
    public function setFechaCumpleanios($fechaCumpleanios)
    {
        $this->fechaCumpleanios = $fechaCumpleanios;
    
        return $this;
    }

    /**
     * Get fechaCumpleanios
     *
     * @return \DateTime 
     */
    public function getFechaCumpleanios()
    {
        return $this->fechaCumpleanios;
    }
}