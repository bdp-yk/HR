<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Absence
 *
 * @ORM\Table(name="absence")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AbsenceRepository")
 */
class Absence
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
     * @var \string
     *
     * @ORM\Column(name="date_debut", type="string")
     */
    private $dateDebut;

    /**
     * @var \string
     *
     * @ORM\Column(name="date_fin", type="string")
     */
    private $dateFin;

    /**
     * @var bool
     *
     * @ORM\Column(name="est_conges", type="boolean")
     */
    private $estConges;

    /**
     * @var bool
     *
     * @ORM\Column(name="est_annuel", type="boolean")
     */
    private $estAnnuel;


    /**
     * var User
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User")
     */
    private $utilisateur;


    /**
     * @var Media
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Media")
     */
    private $media;
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
     * Set dateDebut
     *
     * @param \string $dateDebut
     *
     * @return Absence
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \string
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \string $dateFin
     *
     * @return Absence
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \string
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set estConges
     *
     * @param boolean $estConges
     *
     * @return Absence
     */
    public function setEstConges($estConges)
    {
        $this->estConges = $estConges;

        return $this;
    }

    /**
     * Get estConges
     *
     * @return bool
     */
    public function getEstConges()
    {
        return $this->estConges;
    }

    /**
     * Set estAnnuel
     *
     * @param boolean $estAnnuel
     *
     * @return Absence
     */
    public function setEstAnnuel($estAnnuel)
    {
        $this->estAnnuel = $estAnnuel;

        return $this;
    }

    /**
     * Get estAnnuel
     *
     * @return bool
     */
    public function getEstAnnuel()
    {
        return $this->estAnnuel;
    }

    /**
     * @return mixed
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * @param mixed $utilisateur
     * @return Absence
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;
        return $this;
    }

    /**
     * @return Media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param Media $media
     * @return Absence
     */
    public function setMedia($media)
    {
        $this->media = $media;
        return $this;
    }


}

