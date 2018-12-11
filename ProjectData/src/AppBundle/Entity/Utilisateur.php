<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UtilisateurRepository")
 */
class Utilisateur
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
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="passeport", type="string", length=10, unique=true)
     */
    private $passeport;

    /**
     * @var int
     *
     * @ORM\Column(name="cin", type="integer")
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="rib_bancaire", type="string", length=25)
     */
    private $ribBancaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date")
     */
    private $dateNaissance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_emploie", type="date")
     */
    private $dateEmploie;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_mail", type="string", length=255, unique=true)
     */
    private $adresseMail;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_ville", type="string", length=255)
     */
    private $adresseVille;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_telephone", type="integer")
     */
    private $numeroTelephone;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_civil", type="string", length=255)
     */
    private $etatCivil;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_familial", type="string", length=255)
     */
    private $etatFamilial;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;


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
    private  $departement_associe;


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

    /**
     * @var Role
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Role",inversedBy="liste_utilisateur")
     */
    private $role;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set passeport
     *
     * @param string $passeport
     *
     * @return Utilisateur
     */
    public function setPasseport($passeport)
    {
        $this->passeport = $passeport;

        return $this;
    }

    /**
     * Get passeport
     *
     * @return string
     */
    public function getPasseport()
    {
        return $this->passeport;
    }

    /**
     * Set cin
     *
     * @param integer $cin
     *
     * @return Utilisateur
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return int
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set ribBancaire
     *
     * @param string $ribBancaire
     *
     * @return Utilisateur
     */
    public function setRibBancaire($ribBancaire)
    {
        $this->ribBancaire = $ribBancaire;

        return $this;
    }

    /**
     * Get ribBancaire
     *
     * @return string
     */
    public function getRibBancaire()
    {
        return $this->ribBancaire;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Utilisateur
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set dateEmploie
     *
     * @param \DateTime $dateEmploie
     *
     * @return Utilisateur
     */
    public function setDateEmploie($dateEmploie)
    {
        $this->dateEmploie = $dateEmploie;

        return $this;
    }

    /**
     * Get dateEmploie
     *
     * @return \DateTime
     */
    public function getDateEmploie()
    {
        return $this->dateEmploie;
    }

    /**
     * Set adresseMail
     *
     * @param string $adresseMail
     *
     * @return Utilisateur
     */
    public function setAdresseMail($adresseMail)
    {
        $this->adresseMail = $adresseMail;

        return $this;
    }

    /**
     * Get adresseMail
     *
     * @return string
     */
    public function getAdresseMail()
    {
        return $this->adresseMail;
    }

    /**
     * Set adresseVille
     *
     * @param string $adresseVille
     *
     * @return Utilisateur
     */
    public function setAdresseVille($adresseVille)
    {
        $this->adresseVille = $adresseVille;

        return $this;
    }

    /**
     * Get adresseVille
     *
     * @return string
     */
    public function getAdresseVille()
    {
        return $this->adresseVille;
    }

    /**
     * Set numeroTelephone
     *
     * @param integer $numeroTelephone
     *
     * @return Utilisateur
     */
    public function setNumeroTelephone($numeroTelephone)
    {
        $this->numeroTelephone = $numeroTelephone;

        return $this;
    }

    /**
     * Get numeroTelephone
     *
     * @return int
     */
    public function getNumeroTelephone()
    {
        return $this->numeroTelephone;
    }

    /**
     * Set etatCivil
     *
     * @param string $etatCivil
     *
     * @return Utilisateur
     */
    public function setEtatCivil($etatCivil)
    {
        $this->etatCivil = $etatCivil;

        return $this;
    }

    /**
     * Get etatCivil
     *
     * @return string
     */
    public function getEtatCivil()
    {
        return $this->etatCivil;
    }

    /**
     * Set etatFamilial
     *
     * @param string $etatFamilial
     *
     * @return Utilisateur
     */
    public function setEtatFamilial($etatFamilial)
    {
        $this->etatFamilial = $etatFamilial;

        return $this;
    }

    /**
     * Get etatFamilial
     *
     * @return string
     */
    public function getEtatFamilial()
    {
        return $this->etatFamilial;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Utilisateur
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Utilisateur
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
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
     * @return Utilisateur
     */
    public function setBilansResponsable($bilans_responsable)
    {
        $this->bilans_responsable = $bilans_responsable;
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
     * @return Utilisateur
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
     * @return Utilisateur
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
     * @return Utilisateur
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
     * @return Utilisateur
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
     * @return Utilisateur
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
     * @return Utilisateur
     */
    public function setPhotoProfil($photo_profil)
    {
        $this->photo_profil = $photo_profil;
        return $this;
    }

    /**
     * @return Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param Role $role
     * @return Utilisateur
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }


}

