<?php

namespace ICS\BudgetmanagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Geronimo <geronimo8080@gmail.Com>
 * @ORM\Table(schema="budgetManager")
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 * @ORM\Entity
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="prenom", type="string", length=50, nullable=false)
     */
    private $prenom;

    /**
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @ORM\Column(name="date_naissance", type="date", nullable=false)
     */
    private $dateNaissance;

    /**
     * @ORM\ManyToOne(targetEntity="InfoCompte", inversedBy="client")
     * @ORM\JoinColumn(name="info_compte_id", referencedColumnName="id", nullable=false)
     */
    private $infoCompte;

    /**
     * @ORM\ManyToOne(targetEntity="Email", inversedBy="client")
     * @ORM\JoinColumn(name="email_id", referencedColumnName="id", nullable=false)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="Telephone", inversedBy="client")
     * @ORM\JoinColumn(name="telephone_id", referencedColumnName="id", nullable=false)
     */
    private $telephone;

    /**
     * @ORM\ManyToOne(targetEntity="Adress", inversedBy="client")
     * @ORM\JoinColumn(name="adress_id", referencedColumnName="id", nullable=false)
     */
    private $adress;



    //--- Les Getters & les Setters ---
    function getId()
    {
        return $this->id;
    }

    function getPrenom()
    {
        return $this->prenom;
    }

    function getNom()
    {
        return $this->nom;
    }

    function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    function getInfoCompte()
    {
        return $this->infoCompte;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getTelephone()
    {
        return $this->telephone;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    function setNom($nom)
    {
        $this->nom = $nom;
    }

    function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    function setInfoCompte($infoCompte)
    {
        $this->infoCompte = $infoCompte;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }




    public function __construct()
    {
    }



    public function __toString()
    {
        return $this->nom;
    }

    /**
     * Get the value of adress
     */ 
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set the value of adress
     *
     * @return  self
     */ 
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }
}   //--- Fin de Client