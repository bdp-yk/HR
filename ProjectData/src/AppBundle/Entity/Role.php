<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoleRepository")
 */
class Role
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
     * @ORM\Column(name="designation", type="string", length=50, unique=true)
     */
    private $designation;

    /**
     * @var Utilisateur[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Utilisateur",mappedBy="role")
     */
    private $liste_utilisateur;
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
     * @return Role
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
     * @return Utilisateur[]
     */
    public function getListeUtilisateur()
    {
        return $this->liste_utilisateur;
    }

    /**
     * @param Utilisateur[] $liste_utilisateur
     */
    public function setListeUtilisateur($liste_utilisateur)
    {
        $this->liste_utilisateur = $liste_utilisateur;
    }

}

