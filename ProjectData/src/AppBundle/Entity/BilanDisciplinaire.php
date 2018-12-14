<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BilanDisciplinaire
 *
 * @ORM\Table(name="bilan_discipliaire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BilanDiscipliaireRepository")
 */
class BilanDisciplinaire
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
     * @ORM\Column(name="date_bilan", type="string")
     */
    private $dateBilan;

    /**
     * @var int
     *
     * @ORM\Column(name="note_globale", type="integer")
     */
    private $noteGlobale;

    /**
     * @var string
     *
     * @ORM\Column(name="remarques", type="string", length=255)
     */
    private $remarques;


    /**
     * var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User",inversedBy="bilans_responsable")
     */
    private $responsable;

    /**
     * @var Rating[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Rating",mappedBy="bilans_rating")
     */
    private $ratings;
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
     * Set dateBilan
     *
     * @param \string $dateBilan
     *
     * @return BilanDisciplinaire
     */
    public function setDateBilan($dateBilan)
    {
        $this->dateBilan = $dateBilan;

        return $this;
    }

    /**
     * Get dateBilan
     *
     * @return \string
     */
    public function getDateBilan()
    {
        return $this->dateBilan;
    }

    /**
     * Set noteGlobale
     *
     * @param integer $noteGlobale
     *
     * @return BilanDisciplinaire
     */
    public function setNoteGlobale($noteGlobale)
    {
        $this->noteGlobale = $noteGlobale;

        return $this;
    }

    /**
     * Get noteGlobale
     *
     * @return int
     */
    public function getNoteGlobale()
    {
        return $this->noteGlobale;
    }

    /**
     * Set remarques
     *
     * @param string $remarques
     *
     * @return BilanDisciplinaire
     */
    public function setRemarques($remarques)
    {
        $this->remarques = $remarques;

        return $this;
    }

    /**
     * Get remarques
     *
     * @return string
     */
    public function getRemarques()
    {
        return $this->remarques;
    }

    /**
     * @return mixed
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * @param mixed $responsable
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    }

    /**
     * @return Rating[]
     */
    public function getRatings()
    {
        return $this->ratings;
    }

    /**
     * @param Rating[] $ratings
     */
    public function setRatings($ratings)
    {
        $this->ratings = $ratings;
    }


}

