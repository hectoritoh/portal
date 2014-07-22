<?php

namespace Celmedia\PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\MediaBundle\Model\MediaInterface; 

/**
 * TipoTarjeta
 */
class TipoTarjeta
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
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    protected $imagen;


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
     * @return TipoTarjeta
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
     * @return TipoTarjeta
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
     * Set imagen
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $imagen
     * @return TipoTarjeta
     */
    public function setImagen(MediaInterface $imagen = null)
    {
        $this->imagen = $imagen;
    
        return $this;
    }

    /**
     * Get imagen
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getImagen()
    {
        return $this->imagen;
    }



    
    public function __toString() {
        return ($this->nombre === null) ? ' Nuevo tipo de tarjeta ' : $this->nombre; 
    }


}