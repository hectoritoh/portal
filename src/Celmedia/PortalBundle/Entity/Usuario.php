<?php
// src/Acme/UserBundle/Entity/User.php

namespace Celmedia\PortalBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 */
class Usuario extends BaseUser
{
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
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
     * Add grupos
     *
     * @param \Celmedia\PortalBundle\Entity\Grupo $grupos
     * @return Usuario
     */
    public function addGrupo(\Celmedia\PortalBundle\Entity\Grupo $grupos)
    {
        $this->grupos[] = $grupos;
    
        return $this;
    }

    /**
     * Remove grupos
     *
     * @param \Celmedia\PortalBundle\Entity\Grupo $grupos
     */
    public function removeGrupo(\Celmedia\PortalBundle\Entity\Grupo $grupos)
    {
        $this->grupos->removeElement($grupos);
    }

    /**
     * Get grupos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrupos()
    {
        return $this->grupos;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $campanas;
 

    /**
     * Add campanas
     *
     * @param \Celmedia\PortalBundle\Entity\Campana $campanas
     * @return Usuario
     */
    public function addCampana(\Celmedia\PortalBundle\Entity\Campana $campanas)
    {
        $this->campanas[] = $campanas;
    
        return $this;
    }

    /**
     * Remove campanas
     *
     * @param \Celmedia\PortalBundle\Entity\Campana $campanas
     */
    public function removeCampana(\Celmedia\PortalBundle\Entity\Campana $campanas)
    {
        $this->campanas->removeElement($campanas);
    }

    /**
     * Get campanas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCampanas()
    {
        return $this->campanas;
    }
}