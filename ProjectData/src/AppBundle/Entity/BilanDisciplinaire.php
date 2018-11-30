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
     * @var \DateTime
     *
     * @ORM\Column(name="date_bilan", type="date")
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
     * @param \DateTime $dateBilan
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
     * @return \DateTime
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
}

