<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 *
 * @ORM\Table(name="rating")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RatingRepository")
 */
class Rating
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
     * @ORM\Column(name="sujet", type="string", length=255)
     */
    private $sujet;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User",inversedBy="employe_ratings")
     */
    private  $employe_concerne;


    /**
     * @var BilanDisciplinaire
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\BilanDisciplinaire",inversedBy="ratings")
     */
    private $bilans_rating;
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
     * Set sujet
     *
     * @param string $sujet
     *
     * @return Rating
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set note
     *
     * @param integer $note
     *
     * @return Rating
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @return User
     */
    public function getEmployeConcerne()
    {
        return $this->employe_concerne;
    }

    /**
     * @param User $employe_concerne
     * @return Rating
     */
    public function setEmployeConcerne($employe_concerne)
    {
        $this->employe_concerne = $employe_concerne;
        return $this;
    }

    /**
     * @return BilanDisciplinaire
     */
    public function getBilansRating()
    {
        return $this->bilans_rating;
    }

    /**
     * @param BilanDisciplinaire $bilans_rating
     * @return Rating
     */
    public function setBilansRating($bilans_rating)
    {
        $this->bilans_rating = $bilans_rating;
        return $this;
    }


}

