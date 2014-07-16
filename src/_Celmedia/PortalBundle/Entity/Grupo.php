<?php
// src/Acme/UserBundle/Entity/Group.php

namespace Celmedia\PortalBundle\Entity;

use FOS\UserBundle\Model\Group as BaseGroup;

/**
 * Group
 */
class Grupo extends BaseGroup
{
    /**
     * @var integer
     */
    protected $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}