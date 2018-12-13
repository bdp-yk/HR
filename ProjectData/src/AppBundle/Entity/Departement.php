<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departement
 *
 * @ORM\Table(name="departement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DepartementRepository")
 */
class Departement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=255)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_employe", type="string", length=255)
     */
    private $nombreEmploye;


    /**
     * @var User[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\User",mappedBy="departement_associe")
     */
    private $liste_employes;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Departement
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set nombreEmploye
     *
     * @param string $nombreEmploye
     *
     * @return Departement
     */
    public function setNombreEmploye($nombreEmploye)
    {
        $this->nombreEmploye = $nombreEmploye;

        return $this;
    }

    /**
     * Get nombreEmploye
     *
     * @return string
     */
    public function getNombreEmploye()
    {
        return $this->nombreEmploye;
    }
}

