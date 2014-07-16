<?php

namespace Celmedia\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ciudad
 */
class Ciudad
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
    private $estado;

    /**
     * @var \Celmedia\PortalBundle\Entity\Campana
     */
    private $campana;


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
     * @return Ciudad
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
     * Set estado
     *
     * @param string $estado
     * @return Ciudad
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set campana
     *
     * @param \Celmedia\PortalBundle\Entity\Campana $campana
     * @return Ciudad
     */
    public function setCampana(\Celmedia\PortalBundle\Entity\Campana $campana = null)
    {
        $this->campana = $campana;
    
        return $this;
    }

    /**
     * Get campana
     *
     * @return \Celmedia\PortalBundle\Entity\Campana 
     */
    public function getCampana()
    {
        return $this->campana;
    }



    function __toString(){
        return "". $this->nombre; 
    }
}