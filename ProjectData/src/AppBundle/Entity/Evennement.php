<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evennement
 *
 * @ORM\Table(name="evennement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EvennementRepository")
 */
class Evennement
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
     * @ORM\Column(name="title", type="string", length=50)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \string
     *
     * @ORM\Column(name="date_depart", type="string")
     */
    private $dateDepart;

    /**
     * @var \string
     *
     * @ORM\Column(name="date_fin", type="string")
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=255)
     */
    private $place;

    /**
     * @var string
     *
     * @ORM\Column(name="organisateur", type="string", length=255)
     */
    private $organisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="description_organisateur", type="string", length=255)
     */
    private $descriptionOrganisateur;

    /**
     * @var int
     *
     * @ORM\Column(name="accompagnement", type="integer")
     */
    private $accompagnement;

    /**
     * @var int
     *
     * @ORM\Column(name="frais", type="integer")
     */
    private $frais;

    /**
     * @var string
     *
     * @ORM\Column(name="transport", type="string", length=255)
     */
    private $transport;

    /**
     * @var int
     *
     * @ORM\Column(name="limit_inscription", type="integer")
     */
    private $limitInscription;


    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User",inversedBy="evennements_proposes")
     */
    private $responsable_evennement;


    /**
     * @var User[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User")
     */
    private $adherants;


    /**
     * @var Media
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Media")
     */
    private $media_event;



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
     * Set title
     *
     * @param string $title
     *
     * @return Evennement
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Evennement
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
     * Set dateDepart
     *
     * @param \string $dateDepart
     *
     * @return Evennement
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get dateDepart
     *
     * @return \string
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set dateFin
     *
     * @param \string $dateFin
     *
     * @return Evennement
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
     * Set place
     *
     * @param string $place
     *
     * @return Evennement
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set organisateur
     *
     * @param string $organisateur
     *
     * @return Evennement
     */
    public function setOrganisateur($organisateur)
    {
        $this->organisateur = $organisateur;

        return $this;
    }

    /**
     * Get organisateur
     *
     * @return string
     */
    public function getOrganisateur()
    {
        return $this->organisateur;
    }

    /**
     * Set descriptionOrganisateur
     *
     * @param string $descriptionOrganisateur
     *
     * @return Evennement
     */
    public function setDescriptionOrganisateur($descriptionOrganisateur)
    {
        $this->descriptionOrganisateur = $descriptionOrganisateur;

        return $this;
    }

    /**
     * Get descriptionOrganisateur
     *
     * @return string
     */
    public function getDescriptionOrganisateur()
    {
        return $this->descriptionOrganisateur;
    }

    /**
     * Set accompagnement
     *
     * @param integer $accompagnement
     *
     * @return Evennement
     */
    public function setAccompagnement($accompagnement)
    {
        $this->accompagnement = $accompagnement;

        return $this;
    }

    /**
     * Get accompagnement
     *
     * @return int
     */
    public function getAccompagnement()
    {
        return $this->accompagnement;
    }

    /**
     * Set frais
     *
     * @param integer $frais
     *
     * @return Evennement
     */
    public function setFrais($frais)
    {
        $this->frais = $frais;

        return $this;
    }

    /**
     * Get frais
     *
     * @return int
     */
    public function getFrais()
    {
        return $this->frais;
    }

    /**
     * Set transport
     *
     * @param string $transport
     *
     * @return Evennement
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;

        return $this;
    }

    /**
     * Get transport
     *
     * @return string
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * Set limitInscription
     *
     * @param integer $limitInscription
     *
     * @return Evennement
     */
    public function setLimitInscription($limitInscription)
    {
        $this->limitInscription = $limitInscription;

        return $this;
    }

    /**
     * Get limitInscription
     *
     * @return int
     */
    public function getLimitInscription()
    {
        return $this->limitInscription;
    }

    /**
     * @return User
     */
    public function getResponsableEvennement()
    {
        return $this->responsable_evennement;
    }

    /**
     * @param User $responsable_evennement
     * @return Evennement
     */
    public function setResponsableEvennement($responsable_evennement)
    {
        $this->responsable_evennement = $responsable_evennement;
        return $this;
    }

    /**
     * @return User[]
     */
    public function getAdherants()
    {
        return $this->adherants;
    }

    /**
     * @param User[] $adherants
     * @return Evennement
     */
    public function setAdherants($adherants)
    {
        $this->adherants = $adherants;
        return $this;
    }

    /**
     * @return Media
     */
    public function getMediaEvent()
    {
        return $this->media_event;
    }

    /**
     * @param Media $media_event
     * @return Evennement
     */
    public function setMediaEvent($media_event)
    {
        $this->media_event = $media_event;
        return $this;
    }



}

