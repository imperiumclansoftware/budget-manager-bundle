<?php

namespace ICS\BudgetmanagerBundle\Entity;
// namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Geronimo <geronimo8080@gmail.Com>
 * @ORM\Table(schema="budgetManager")
 * @ORM\Entity(repositoryClass="App\Repository\AdresseClientRepository")
 * @ORM\Entity
 */
class Adress
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(name="num_voie", type="string", length=20, nullable=false)
     */
    private $numVoie;

    /**
     * @var string
     * @ORM\Column(name="voie", type="string", length=200, nullable=false)
     */
    private $voie;

    /**
     * @var int
     * @ORM\Column(name="cp", type="integer", length=6, nullable=false, precision=5)
     */
    private $cp;

    /**
     * @var text
     * @ORM\Column(name="ville",type="string", length=200, nullable=false)
     */
    private $ville;

    /**
     * @var text
     * @ORM\OneToMany(targetEntity="Client", mappedBy="adress")
     */
    private $client;


    //--- Le Construc ---
    public function __construct()
    {
        $this->client = new ArrayCollection();
    }
    //--- Les Getters & les Setters ---
    function getId()
    {
        return $this->id;
    }

    function getNumVoie()
    {
        return $this->numVoie;
    }

    function getVoie()
    {
        return $this->voie;
    }

    function getCp()
    {
        return $this->cp;
    }

    function getVille()
    {
        return $this->ville;
    }

    function getClient()
    {
        return $this->client;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setNumVoie($numVoie)
    {
        $this->numVoie = $numVoie;
    }

    function setVoie($voie)
    {
        $this->voie = $voie;
    }

    function setCp($cp)
    {
        $this->cp = $cp;
    }

    function setVille($ville)
    {
        $this->ville = $ville;
    }

    function setClient($client)
    {
        $this->client = $client;
}
}   //--- Fin de AdresseClient