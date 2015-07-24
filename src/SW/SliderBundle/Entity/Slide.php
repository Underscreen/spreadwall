<?php

namespace SW\SliderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Slide
 *
 * @ORM\Table(name="slide")
 * @ORM\Entity(repositoryClass="SW\SliderBundle\Entity\SlideRepository")
 * @Vich\Uploadable
 */
class Slide
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
     * @ORM\Column(name="delai", type="string", length=255)
     */
    private $delai;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName")
     * 
     * @var File $imageFile
     */
    protected $imageFile;

    /**
     * @ORM\Column(type="string", length=255, name="image_name", nullable=true)
     *
     * @var string $imageName
     */
    protected $imageName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime $updatedAt
     */
    protected $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="SW\SliderBundle\Entity\Transition")
     * @ORM\JoinColumn(nullable=false)
     */
    private $transition;

    /**
     * @ORM\ManyToOne(targetEntity="SW\SliderBundle\Entity\Slider", inversedBy="slides")
     * @ORM\JoinColumn(nullable=false)
     */
    private $slider;

    /**
     * @ORM\OneToMany(targetEntity="SW\SliderBundle\Entity\Element", mappedBy="slide")
    */
    private $elements;




    /**
     * Constructor
     */
    public function __construct()
    {
        $this->elements = new \Doctrine\Common\Collections\ArrayCollection();
        $this->updatedAt = new \DateTime('now');
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
     * @return Slide
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
     * Set delai
     *
     * @param string $delai
     * @return Slide
     */
    public function setDelai($delai)
    {
        $this->delai = $delai;

        return $this;
    }

    /**
     * Get delai
     *
     * @return string 
     */
    public function getDelai()
    {
        return $this->delai;
    }

    /**
     * Set transition
     *
     * @param \SW\SliderBundle\Entity\Transition $transition
     * @return Slide
     */
    public function setTransition(\SW\SliderBundle\Entity\Transition $transition)
    {
        $this->transition = $transition;

        return $this;
    }

    /**
     * Get transition
     *
     * @return \SW\SliderBundle\Entity\Transition 
     */
    public function getTransition()
    {
        return $this->transition;
    }

    /**
     * Set slide
     *
     * @param \SW\SliderBundle\Entity\Slide $slide
     * @return Slide
     */
    public function setSlide(\SW\SliderBundle\Entity\Slide $slide)
    {
        $this->slide = $slide;

        return $this;
    }

    /**
     * Get slide
     *
     * @return \SW\SliderBundle\Entity\Slide 
     */
    public function getSlide()
    {
        return $this->slide;
    }


    /**
     * Set slider
     *
     * @param \SW\SliderBundle\Entity\Slider $slider
     * @return Slide
     */
    public function setSlider(\SW\SliderBundle\Entity\Slider $slider)
    {
        $this->slider = $slider;

        return $this;
    }

    /**
     * Get slider
     *
     * @return \SW\SliderBundle\Entity\Slider 
     */
    public function getSlider()
    {
        return $this->slider;
    }


    /**
     * Add elements
     *
     * @param \SW\SliderBundle\Entity\Element $elements
     * @return Slide
     */
    public function addElement(\SW\SliderBundle\Entity\Element $elements)
    {
        $this->elements[] = $elements;

        return $this;
    }

    /**
     * Remove elements
     *
     * @param \SW\SliderBundle\Entity\Element $elements
     */
    public function removeElement(\SW\SliderBundle\Entity\Element $elements)
    {
        $this->elements->removeElement($elements);
    }

    /**
     * Get elements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     * @return Slide
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string 
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Slide
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

        /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }
}
