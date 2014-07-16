<?php

namespace Celmedia\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Envio
 */
class Envio
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fechaEnvio;

    /**
     * @var \DateTime
     */
    private $estado;

    /**
     * @var \Celmedia\PortalBundle\Entity\Cliente
     */
    private $cliente;

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
     * Set fechaEnvio
     *
     * @param \DateTime $fechaEnvio
     * @return Envio
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
     * Set estado
     *
     * @param \DateTime $estado
     * @return Envio
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return \DateTime 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set cliente
     *
     * @param \Celmedia\PortalBundle\Entity\Cliente $cliente
     * @return Envio
     */
    public function setCliente(\Celmedia\PortalBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;
    
        return $this;
    }

    /**
     * Get cliente
     *
     * @return \Celmedia\PortalBundle\Entity\Cliente 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set campana
     *
     * @param \Celmedia\PortalBundle\Entity\Campana $campana
     * @return Envio
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
}