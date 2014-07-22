<?php

namespace Celmedia\CrmCanjeadorCodigosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participante
 */
class Participante
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $id_facebook;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $telefono;

    /**
     * @var string
     */
    private $nombres;

    /**
     * @var integer
     */
    private $borrado;

    /**
     * @var integer
     */
    private $puntaje;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $codigosCanjeados;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codigosCanjeados = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set id_facebook
     *
     * @param string $idFacebook
     * @return Participante
     */
    public function setIdFacebook($idFacebook)
    {
        $this->id_facebook = $idFacebook;

        return $this;
    }

    /**
     * Get id_facebook
     *
     * @return string 
     */
    public function getIdFacebook()
    {
        return $this->id_facebook;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Participante
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Participante
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
     * Set nombres
     *
     * @param string $nombres
     * @return Participante
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set borrado
     *
     * @param integer $borrado
     * @return Participante
     */
    public function setBorrado($borrado)
    {
        $this->borrado = $borrado;

        return $this;
    }

    /**
     * Get borrado
     *
     * @return integer 
     */
    public function getBorrado()
    {
        return $this->borrado;
    }

    /**
     * Set puntaje
     *
     * @param integer $puntaje
     * @return Participante
     */
    public function setPuntaje($puntaje)
    {
        $this->puntaje = $puntaje;

        return $this;
    }

    /**
     * Get puntaje
     *
     * @return integer 
     */
    public function getPuntaje()
    {
        return $this->puntaje;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Participante
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Participante
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add codigosCanjeados
     *
     * @param \Celmedia\CrmCanjeadorCodigosBundle\Entity\Codigo $codigosCanjeados
     * @return Participante
     */
    public function addCodigosCanjeado(\Celmedia\CrmCanjeadorCodigosBundle\Entity\Codigo $codigosCanjeados)
    {
        $this->codigosCanjeados[] = $codigosCanjeados;

        return $this;
    }

    /**
     * Remove codigosCanjeados
     *
     * @param \Celmedia\CrmCanjeadorCodigosBundle\Entity\Codigo $codigosCanjeados
     */
    public function removeCodigosCanjeado(\Celmedia\CrmCanjeadorCodigosBundle\Entity\Codigo $codigosCanjeados)
    {
        $this->codigosCanjeados->removeElement($codigosCanjeados);
    }

    /**
     * Get codigosCanjeados
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCodigosCanjeados()
    {
        return $this->codigosCanjeados;
    }
    /**
     * @ORM\PrePersist
     */
    public function preInsert()
    {
        // Add your code here
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        // Add your code here
    }
    /**
     * @var string
     */
    private $sexo;

    /**
     * @var string
     */
    private $operadora;

    /**
     * @var integer
     */
    private $aplicacion;


    /**
     * Set sexo
     *
     * @param string $sexo
     * @return Participante
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
     * Set operadora
     *
     * @param string $operadora
     * @return Participante
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
     * Set aplicacion
     *
     * @param integer $aplicacion
     * @return Participante
     */
    public function setAplicacion($aplicacion)
    {
        $this->aplicacion = $aplicacion;
    
        return $this;
    }

    /**
     * Get aplicacion
     *
     * @return integer 
     */
    public function getAplicacion()
    {
        return $this->aplicacion;
    }
    /**
     * @var string
     */
    private $id_twitter;

    /**
     * @var string
     */
    private $ciudad;

    /**
     * @var integer
     */
    private $edad;


    /**
     * Set id_twitter
     *
     * @param string $idTwitter
     * @return Participante
     */
    public function setIdTwitter($idTwitter)
    {
        $this->id_twitter = $idTwitter;
    
        return $this;
    }

    /**
     * Get id_twitter
     *
     * @return string 
     */
    public function getIdTwitter()
    {
        return $this->id_twitter;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     * @return Participante
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    
        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set edad
     *
     * @param integer $edad
     * @return Participante
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
}