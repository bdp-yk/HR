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
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date")
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
     * @param \DateTime $dateDebut
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
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
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
     * @return \DateTime
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
}

