<?php

namespace SW\SliderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Slider
 *
 * @ORM\Table(name="slider")
 * @ORM\Entity(repositoryClass="SW\SliderBundle\Entity\SliderRepository")
 */
class Slider
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="largeur", type="string", length=255)
     */
    private $largeur;

    /**
     * @var string
     *
     * @ORM\Column(name="hauteur", type="string", length=255)
     */
    private $hauteur;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=255)
     */
    private $position;

    /**
     * @ORM\OneToMany(targetEntity="SW\SliderBundle\Entity\Slide", mappedBy="slider", cascade={"persist"})
    */
    private $slides;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->slides = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set name
     *
     * @param string $name
     * @return Slider
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set largeur
     *
     * @param string $largeur
     * @return Slider
     */
    public function setLargeur($largeur)
    {
        $this->largeur = $largeur;

        return $this;
    }

    /**
     * Get largeur
     *
     * @return string 
     */
    public function getLargeur()
    {
        return $this->largeur;
    }

    /**
     * Set hauteur
     *
     * @param string $hauteur
     * @return Slider
     */
    public function setHauteur($hauteur)
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    /**
     * Get hauteur
     *
     * @return string 
     */
    public function getHauteur()
    {
        return $this->hauteur;
    }

    /**
     * Set position
     *
     * @param string $position
     * @return Slider
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }


    /**
     * Add slides
     *
     * @param \SW\SliderBundle\Entity\Slide $slides
     * @return Slider
     */
    public function addSlide(\SW\SliderBundle\Entity\Slide $slides)
    {
        $this->slides[] = $slides;

        return $this;
    }

    /**
     * Remove slides
     *
     * @param \SW\SliderBundle\Entity\Slide $slides
     */
    public function removeSlide(\SW\SliderBundle\Entity\Slide $slides)
    {
        $this->slides->removeElement($slides);
    }

    /**
     * Get slides
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSlides()
    {
        return $this->slides;
    }
}
