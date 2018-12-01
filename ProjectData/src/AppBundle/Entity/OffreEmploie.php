<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OffreEmploie
 *
 * @ORM\Table(name="offre_emploie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OffreEmploieRepository")
 */
class OffreEmploie
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=255)
     */
    private $poste;

    /**
     * @var int
     *
     * @ORM\Column(name="salaire", type="integer")
     */
    private $salaire;

    /**
     * @var string
     *
     * @ORM\Column(name="promotion", type="string", length=255)
     */
    private $promotion;

    /**
     * @var Candidature[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Candidature",mappedBy="offre_candidature")
     */
    private  $liste_candidature;


    /**
     * @var Media
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Media")
     */
    private $media_offre;
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
     * Set titre
     *
     * @param string $titre
     *
     * @return OffreEmploie
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return OffreEmploie
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set poste
     *
     * @param string $poste
     *
     * @return OffreEmploie
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste
     *
     * @return string
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * Set salaire
     *
     * @param integer $salaire
     *
     * @return OffreEmploie
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;

        return $this;
    }

    /**
     * Get salaire
     *
     * @return int
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * Set promotion
     *
     * @param string $promotion
     *
     * @return OffreEmploie
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * Get promotion
     *
     * @return string
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * @return Candidature[]
     */
    public function getListeCandidature()
    {
        return $this->liste_candidature;
    }

    /**
     * @param Candidature[] $liste_candidature
     */
    public function setListeCandidature($liste_candidature)
    {
        $this->liste_candidature = $liste_candidature;
    }

    /**
     * @return Media
     */
    public function getMediaOffre()
    {
        return $this->media_offre;
    }

    /**
     * @param Media $media_offre
     */
    public function setMediaOffre($media_offre)
    {
        $this->media_offre = $media_offre;
    }

}

