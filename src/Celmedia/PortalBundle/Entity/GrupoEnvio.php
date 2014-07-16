<?php

namespace Celmedia\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GrupoEnvio
 */
class GrupoEnvio
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
    private $descipcion;

    /**
     * @var \DateTime
     */
    private $fechaCreacion;

    /**
     * @var boolean
     */
    private $estado;

    /**
     * @var integer
     */
    private $tipo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $registros;

    /**
     * @var \Celmedia\PortalBundle\Entity\Usuario
     */
    private $usuario;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->registros = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return GrupoEnvio
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
     * Set descipcion
     *
     * @param string $descipcion
     * @return GrupoEnvio
     */
    public function setDescipcion($descipcion)
    {
        $this->descipcion = $descipcion;
    
        return $this;
    }

    /**
     * Get descipcion
     *
     * @return string 
     */
    public function getDescipcion()
    {
        return $this->descipcion;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return GrupoEnvio
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
     * Set estado
     *
     * @param boolean $estado
     * @return GrupoEnvio
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     * @return GrupoEnvio
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Add registros
     *
     * @param \Celmedia\PortalBundle\Entity\Cliente $registros
     * @return GrupoEnvio
     */
    public function addRegistro(\Celmedia\PortalBundle\Entity\Cliente $registros)
    {
        $this->registros[] = $registros;
    
        return $this;
    }

    /**
     * Remove registros
     *
     * @param \Celmedia\PortalBundle\Entity\Cliente $registros
     */
    public function removeRegistro(\Celmedia\PortalBundle\Entity\Cliente $registros)
    {
        $this->registros->removeElement($registros);
    }

    /**
     * Get registros
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegistros()
    {
        return $this->registros;
    }

    /**
     * Set usuario
     *
     * @param \Celmedia\PortalBundle\Entity\Usuario $usuario
     * @return GrupoEnvio
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
}