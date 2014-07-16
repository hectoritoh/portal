<?php

namespace Celmedia\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 */
class Cliente
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
    private $correo;

    /**
     * @var string
     */
    private $telefono;

    /**
     * @var string
     */
    private $sexo;

    /**
     * @var \DateTime
     */
    private $cumpleanos;

    /**
     * @var \Celmedia\PortalBundle\Entity\GrupoEnvio
     */
    private $grupos;


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
     * @return Cliente
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
     * Set correo
     *
     * @param string $correo
     * @return Cliente
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    
        return $this;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Cliente
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return Cliente
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    
        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set cumpleanos
     *
     * @param \DateTime $cumpleanos
     * @return Cliente
     */
    public function setCumpleanos($cumpleanos)
    {
        $this->cumpleanos = $cumpleanos;
    
        return $this;
    }

    /**
     * Get cumpleanos
     *
     * @return \DateTime 
     */
    public function getCumpleanos()
    {
        return $this->cumpleanos;
    }

    /**
     * Set grupos
     *
     * @param \Celmedia\PortalBundle\Entity\GrupoEnvio $grupos
     * @return Cliente
     */
    public function setGrupos(\Celmedia\PortalBundle\Entity\GrupoEnvio $grupos = null)
    {
        $this->grupos = $grupos;
    
        return $this;
    }

    /**
     * Get grupos
     *
     * @return \Celmedia\PortalBundle\Entity\GrupoEnvio 
     */
    public function getGrupos()
    {
        return $this->grupos;
    }
    /**
     * @var string
     */
    private $operadora;


    /**
     * Set operadora
     *
     * @param string $operadora
     * @return Cliente
     */
    public function setOperadora($operadora)
    {
        $this->operadora = $operadora;
    
        return $this;
    }

    /**
     * Get operadora
     *
     * @return string 
     */
    public function getOperadora()
    {
        return $this->operadora;
    }
    /**
     * @var integer
     */
    private $edad;


    /**
     * Set edad
     *
     * @param integer $edad
     * @return Cliente
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
     * @var integer
     */
    private $nacionalidad;


    /**
     * Set nacionalidad
     *
     * @param integer $nacionalidad
     * @return Cliente
     */
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;
    
        return $this;
    }

    /**
     * Get nacionalidad
     *
     * @return integer 
     */
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }
}