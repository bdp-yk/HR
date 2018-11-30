<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidature
 *
 * @ORM\Table(name="candidature")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CandidatureRepository")
 */
class Candidature
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
     * @var int
     *
     * @ORM\Column(name="qualification", type="integer")
     */
    private $qualification;

    /**
     * @var string
     *
     * @ORM\Column(name="motivation", type="string", length=255)
     */
    private $motivation;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat_candidature", type="boolean")
     */
    private $etatCandidature;


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
     * Set qualification
     *
     * @param integer $qualification
     *
     * @return Candidature
     */
    public function setQualification($qualification)
    {
        $this->qualification = $qualification;

        return $this;
    }

    /**
     * Get qualification
     *
     * @return int
     */
    public function getQualification()
    {
        return $this->qualification;
    }

    /**
     * Set motivation
     *
     * @param string $motivation
     *
     * @return Candidature
     */
    public function setMotivation($motivation)
    {
        $this->motivation = $motivation;

        return $this;
    }

    /**
     * Get motivation
     *
     * @return string
     */
    public function getMotivation()
    {
        return $this->motivation;
    }

    /**
     * Set etatCandidature
     *
     * @param boolean $etatCandidature
     *
     * @return Candidature
     */
    public function setEtatCandidature($etatCandidature)
    {
        $this->etatCandidature = $etatCandidature;

        return $this;
    }

    /**
     * Get etatCandidature
     *
     * @return bool
     */
    public function getEtatCandidature()
    {
        return $this->etatCandidature;
    }
}

