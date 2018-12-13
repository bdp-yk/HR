<?php

namespace AppBundle\Entity;

use AppBundle\Repository\OffreEmploieRepository;
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
     * @var User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User",inversedBy="liste_candidature")
     */
    private $utilisateur_candidat;


    /**
     * @var OffreEmploie
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\OffreEmploie",inversedBy="liste_candidature")
     */
    private $offre_candidature;


    /**
     * @var Media
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Media",mappedBy="candidat_proprietaire")
     */
    private $documents_associes;


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

    /**
     * @return User
     */
    public function getUtilisateurCandidat()
    {
        return $this->utilisateur_candidat;
    }

    /**
     * @param User $utilisateur_candidat
     * @return Candidature
     */
    public function setUtilisateurCandidat($utilisateur_candidat)
    {
        $this->utilisateur_candidat = $utilisateur_candidat;
        return $this;
    }

    /**
     * @return OffreEmploie
     */
    public function getOffreCandidature()
    {
        return $this->offre_candidature;
    }

    /**
     * @param OffreEmploie $offre_candidature
     * @return Candidature
     */
    public function setOffreCandidature($offre_candidature)
    {
        $this->offre_candidature = $offre_candidature;
        return $this;
    }

    /**
     * @return Media
     */
    public function getDocumentsAssocies()
    {
        return $this->documents_associes;
    }

    /**
     * @param Media $documents_associes
     * @return Candidature
     */
    public function setDocumentsAssocies($documents_associes)
    {
        $this->documents_associes = $documents_associes;
        return $this;
    }



}

