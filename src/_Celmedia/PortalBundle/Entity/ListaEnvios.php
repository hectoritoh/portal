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
}