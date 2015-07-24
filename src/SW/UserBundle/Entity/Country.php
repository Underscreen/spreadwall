<?php

namespace SW\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="SW\UserBundle\Entity\CountryRepository")
 */
class Country
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="code", type="integer")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="alpha2", type="string", length=255)
     */
    private $alpha2;

    /**
     * @var string
     *
     * @ORM\Column(name="alpha3", type="string", length=255)
     */
    private $alpha3;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_en_gb", type="string", length=255)
     */
    private $nom_en_gb;


    /**
     * @var string
     *
     * @ORM\Column(name="nom_fr_fr", type="string", length=255)
     */
    private $nom_fr_fr;

    /**
     * @ORM\OneToMany(targetEntity="SW\UserBundle\Entity\User", mappedBy="country")
    */
    private $users;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param integer $code
     * @return Pays
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set alpha2
     *
     * @param string $alpha2
     * @return Pays
     */
    public function setAlpha2($alpha2)
    {
        $this->alpha2 = $alpha2;

        return $this;
    }

    /**
     * Get alpha2
     *
     * @return string 
     */
    public function getAlpha2()
    {
        return $this->alpha2;
    }

    /**
     * Set alpha3
     *
     * @param string $alpha3
     * @return Pays
     */
    public function setAlpha3($alpha3)
    {
        $this->alpha3 = $alpha3;

        return $this;
    }

    /**
     * Get alpha3
     *
     * @return string 
     */
    public function getAlpha3()
    {
        return $this->alpha3;
    }

    /**
     * Set nom_en_gb
     *
     * @param string $nomEnGb
     * @return Pays
     */
    public function setNomEnGb($nomEnGb)
    {
        $this->nom_en_gb = $nomEnGb;

        return $this;
    }

    /**
     * Get nom_en_gb
     *
     * @return string 
     */
    public function getNomEnGb()
    {
        return $this->nom_en_gb;
    }

    /**
     * Set nom_fr_fr
     *
     * @param string $nomFrFr
     * @return Pays
     */
    public function setNomFrFr($nomFrFr)
    {
        $this->nom_fr_fr = $nomFrFr;

        return $this;
    }

    /**
     * Get nom_fr_fr
     *
     * @return string 
     */
    public function getNomFrFr()
    {
        return $this->nom_fr_fr;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add users
     *
     * @param \SW\UserBundle\Entity\User $users
     * @return Country
     */
    public function addUser(\SW\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \SW\UserBundle\Entity\User $users
     */
    public function removeUser(\SW\UserBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
