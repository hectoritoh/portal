<?php

namespace Celmedia\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campana
 */
class Campana
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
     * @var \DateTime
     */
    private $fechaCumpleanos;

    /**
     * @var \DateTime
     */
    private $fechaCreacion;

    /**
     * @var integer
     */
    private $edadMinima;

    /**
     * @var integer
     */
    private $edadMaxima;

    /**
     * @var integer
     */
    private $genero;

    /**
     * @var integer
     */
    private $estado;

    /**
     * @var string
     */
    private $objetivo;

    /**
     * @var \Celmedia\PortalBundle\Entity\Mensaje
     */
    private $mensaje;

    /**
     * @var \Celmedia\PortalBundle\Entity\Usuario
     */
    private $usuario;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $ciudades;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ciudades = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * @return Campana
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
     * Set fechaCumpleanos
     *
     * @param \DateTime $fechaCumpleanos
     * @return Campana
     */
    public function setFechaCumpleanos($fechaCumpleanos)
    {
        $this->fechaCumpleanos = $fechaCumpleanos;
    
        return $this;
    }

    /**
     * Get fechaCumpleanos
     *
     * @return \DateTime 
     */
    public function getFechaCumpleanos()
    {
        return $this->fechaCumpleanos;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return Campana
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
     * Set edadMinima
     *
     * @param integer $edadMinima
     * @return Campana
     */
    public function setEdadMinima($edadMinima)
    {
        $this->edadMinima = $edadMinima;
    
        return $this;
    }

    /**
     * Get edadMinima
     *
     * @return integer 
     */
    public function getEdadMinima()
    {
        return $this->edadMinima;
    }

    /**
     * Set edadMaxima
     *
     * @param integer $edadMaxima
     * @return Campana
     */
    public function setEdadMaxima($edadMaxima)
    {
        $this->edadMaxima = $edadMaxima;
    
        return $this;
    }

    /**
     * Get edadMaxima
     *
     * @return integer 
     */
    public function getEdadMaxima()
    {
        return $this->edadMaxima;
    }

    /**
     * Set genero
     *
     * @param integer $genero
     * @return Campana
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
    
        return $this;
    }

    /**
     * Get genero
     *
     * @return integer 
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Campana
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
     * Set objetivo
     *
     * @param string $objetivo
     * @return Campana
     */
    public function setObjetivo($objetivo)
    {
        $this->objetivo = $objetivo;
    
        return $this;
    }

    /**
     * Get objetivo
     *
     * @return string 
     */
    public function getObjetivo()
    {
        return $this->objetivo;
    }

    /**
     * Set mensaje
     *
     * @param \Celmedia\PortalBundle\Entity\Mensaje $mensaje
     * @return Campana
     */
    public function setMensaje(\Celmedia\PortalBundle\Entity\Mensaje $mensaje = null)
    {
        $this->mensaje = $mensaje;
    
        return $this;
    }

    /**
     * Get mensaje
     *
     * @return \Celmedia\PortalBundle\Entity\Mensaje 
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Set usuario
     *
     * @param \Celmedia\PortalBundle\Entity\Usuario $usuario
     * @return Campana
     */
    public function setUsuario(\Celmedia\PortalBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Celmedia\PortalBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Add ciudades
     *
     * @param \Celmedia\PortalBundle\Entity\Ciudad $ciudades
     * @return Campana
     */
    public function addCiudade(\Celmedia\PortalBundle\Entity\Ciudad $ciudades)
    {
        $this->ciudades[] = $ciudades;
    
        return $this;
    }

    /**
     * Remove ciudades
     *
     * @param \Celmedia\PortalBundle\Entity\Ciudad $ciudades
     */
    public function removeCiudade(\Celmedia\PortalBundle\Entity\Ciudad $ciudades)
    {
        $this->ciudades->removeElement($ciudades);
    }

    /**
     * Get ciudades
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCiudades()
    {
        return $this->ciudades;
    }
}