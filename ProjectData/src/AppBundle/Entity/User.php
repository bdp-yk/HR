<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\Collection;
use UserBundle\Model\GroupInterface;
use UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true,nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="passeport", type="string", length=10, unique=true,nullable=true)
     */
    private $passeport;

    /**
     * @var int
     *
     * @ORM\Column(name="cin", type="integer",nullable=true)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="rib_bancaire", type="string", length=25,nullable=true)
     */
    private $ribBancaire;

    /**
     * @var string
     *
     * @ORM\Column(name="date_naissance", type="string",nullable=true)
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="date_emploie", type="string",nullable=true)
     */
    private $dateEmploie;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_mail", type="string", length=255, unique=true,nullable=true)
     */
    private $adresseMail;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_ville", type="string", length=255, nullable=true)
     */
    private $adresseVille;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_telephone", type="integer", nullable=true)
     */
    private $numeroTelephone;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_civil", type="string", length=255, nullable=true)
     */
    private $etatCivil;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_familial", type="string", length=255, nullable=true)
     */
    private $etatFamilial;

    /**
     * @var BilanDisciplinaire[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\BilanDisciplinaire",mappedBy="responsable")
     */

    private $bilans_responsable;

    /**
     * @var Rating[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Rating",mappedBy="employe_concerne")
     */
    private $employe_ratings;

    /**
     * @var Candidature[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Candidature",mappedBy="utilisateur_candidat")
     */
    private $liste_candidature;


    /**
     * @var Departement
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Departement",inversedBy="liste_employes")
     */
    private $departement_associe;


    /**
     * @var Evennement[]
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Evennement",mappedBy="responsable_evennement")
     */
    private $evennements_proposes;

    /**
     * @var Evennement[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Evennement")
     */
    private $evennements_adheres;


    /**
     * @var Media
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Media")
     */
    private $photo_profil;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsernameCanonical()
    {
        return $this->usernameCanonical;
    }

    /**
     * @param string $usernameCanonical
     */
    public function setUsernameCanonical($usernameCanonical)
    {
        $this->usernameCanonical = $usernameCanonical;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmailCanonical()
    {
        return $this->emailCanonical;
    }

    /**
     * @param string $emailCanonical
     */
    public function setEmailCanonical($emailCanonical)
    {
        $this->emailCanonical = $emailCanonical;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * @return string|null
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return int
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * @param int $cin
     * @return User
     */
    public function setCin($cin)
    {
        $this->cin = $cin;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @param string $dateNaissance
     * @return User
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateEmploie()
    {
        return $this->dateEmploie;
    }

    /**
     * @param string $dateEmploie
     * @return User
     */
    public function setDateEmploie($dateEmploie)
    {
        $this->dateEmploie = $dateEmploie;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdresseMail()
    {
        return $this->adresseMail;
    }

    /**
     * @param string $adresseMail
     * @return User
     */
    public function setAdresseMail($adresseMail)
    {
        $this->adresseMail = $adresseMail;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdresseVille()
    {
        return $this->adresseVille;
    }

    /**
     * @param string $adresseVille
     * @return User
     */
    public function setAdresseVille($adresseVille)
    {
        $this->adresseVille = $adresseVille;
        return $this;
    }

    /**
     * @return string
     */
    public function getEtatFamilial()
    {
        return $this->etatFamilial;
    }

    /**
     * @param string $etatFamilial
     * @return User
     */
    public function setEtatFamilial($etatFamilial)
    {
        $this->etatFamilial = $etatFamilial;
        return $this;
    }

    /**
     * @return BilanDisciplinaire[]
     */
    public function getBilansResponsable()
    {
        return $this->bilans_responsable;
    }

    /**
     * @param BilanDisciplinaire[] $bilans_responsable
     * @return User
     */
    public function setBilansResponsable($bilans_responsable)
    {
        $this->bilans_responsable = $bilans_responsable;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getPasseport()
    {
        return $this->passeport;
    }

    /**
     * @param string $passeport
     * @return User
     */
    public function setPasseport($passeport)
    {
        $this->passeport = $passeport;
        return $this;
    }

    /**
     * @return string
     */
    public function getRibBancaire()
    {
        return $this->ribBancaire;
    }

    /**
     * @param string $ribBancaire
     * @return User
     */
    public function setRibBancaire($ribBancaire)
    {
        $this->ribBancaire = $ribBancaire;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumeroTelephone()
    {
        return $this->numeroTelephone;
    }

    /**
     * @param int $numeroTelephone
     * @return User
     */
    public function setNumeroTelephone($numeroTelephone)
    {
        $this->numeroTelephone = $numeroTelephone;
        return $this;
    }

    /**
     * @return string
     */
    public function getEtatCivil()
    {
        return $this->etatCivil;
    }

    /**
     * @param string $etatCivil
     * @return User
     */
    public function setEtatCivil($etatCivil)
    {
        $this->etatCivil = $etatCivil;
        return $this;
    }

    /**
     * @return Rating[]
     */
    public function getEmployeRatings()
    {
        return $this->employe_ratings;
    }

    /**
     * @param Rating[] $employe_ratings
     * @return User
     */
    public function setEmployeRatings($employe_ratings)
    {
        $this->employe_ratings = $employe_ratings;
        return $this;
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
     * @return User
     */
    public function setListeCandidature($liste_candidature)
    {
        $this->liste_candidature = $liste_candidature;
        return $this;
    }

    /**
     * @return Departement
     */
    public function getDepartementAssocie()
    {
        return $this->departement_associe;
    }

    /**
     * @param Departement $departement_associe
     * @return User
     */
    public function setDepartementAssocie($departement_associe)
    {
        $this->departement_associe = $departement_associe;
        return $this;
    }

    /**
     * @return Evennement[]
     */
    public function getEvennementsProposes()
    {
        return $this->evennements_proposes;
    }

    /**
     * @param Evennement[] $evennements_proposes
     * @return User
     */
    public function setEvennementsProposes($evennements_proposes)
    {
        $this->evennements_proposes = $evennements_proposes;
        return $this;
    }

    /**
     * @return Evennement[]
     */
    public function getEvennementsAdheres()
    {
        return $this->evennements_adheres;
    }

    /**
     * @param Evennement[] $evennements_adheres
     * @return User
     */
    public function setEvennementsAdheres($evennements_adheres)
    {
        $this->evennements_adheres = $evennements_adheres;
        return $this;
    }

    /**
     * @return Media
     */
    public function getPhotoProfil()
    {
        return $this->photo_profil;
    }

    /**
     * @param Media $photo_profil
     * @return User
     */
    public function setPhotoProfil($photo_profil)
    {
        $this->photo_profil = $photo_profil;
        return $this;
    }


}