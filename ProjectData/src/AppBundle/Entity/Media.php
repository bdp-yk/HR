<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MediaRepository")
 */
class Media
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255)
     */
    private $source;

    /**
     * @var Candidature
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Candidature",inversedBy="documents_associes")
     */
    private $candidat_proprietaire;


    /**
     * @var Media
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Media")
     */
    private $media_offre;

    /**
     * @var Absence
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Absence")
     */
    private $absence;


    /**
     * @var Evennement
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Evennement")
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
     * Set type
     *
     * @param string $type
     *
     * @return Media
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set source
     *
     * @param string $source
     *
     * @return Media
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return Candidature
     */
    public function getCandidatProprietaire()
    {
        return $this->candidat_proprietaire;
    }

    /**
     * @param Candidature $candidat_proprietaire
     */
    public function setCandidatProprietaire($candidat_proprietaire)
    {
        $this->candidat_proprietaire = $candidat_proprietaire;
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

    /**
     * @return Absence
     */
    public function getAbsence()
    {
        return $this->absence;
    }

    /**
     * @param Absence $absence
     */
    public function setAbsence($absence)
    {
        $this->absence = $absence;
    }

    /**
     * @return Evennement
     */
    public function getMediaEvent()
    {
        return $this->media_event;
    }

    /**
     * @param Evennement $media_event
     */
    public function setMediaEvent($media_event)
    {
        $this->media_event = $media_event;
    }

}

