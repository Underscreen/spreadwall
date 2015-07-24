<?php

namespace SW\SliderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Element
 *
 * @ORM\Table(name="element")
 * @ORM\Entity(repositoryClass="SW\SliderBundle\Entity\ElementRepository")
 * @Vich\Uploadable
 */
class Element
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
     * @ORM\Column(name="genre", type="string", length=255)
     */
    private $genre = "p";

    /**
     * @var string
     *
     * @ORM\Column(name="positionTop", type="string", length=255)
     */
    private $positionTop = "50px";

    /**
     * @var string
     *
     * @ORM\Column(name="positionLeft", type="string", length=255)
     */
    private $positionLeft = "50px";

    /**
     * @var string
     *
     * @ORM\Column(name="background", type="string", length=255,)
     */
    private $background = "#E54022";

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color = "#fff";

    /**
     * @var integer
     *
     * @ORM\Column(name="inoffsetx", type="integer", nullable=true )
     */
    private $inOffsetX = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="inoffsety", type="integer", nullable=true )
     */
    private $inOffsetY = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="induration", type="integer", nullable=true )
     */
    private $inDuration = 1000;

    /**
     * @var integer
     *
     * @ORM\Column(name="indelay", type="integer", nullable=true )
     */
    private $inDelay = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="inrotate", type="integer", nullable=true )
     */
    private $inRotate = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="inscalex", type="integer", nullable=true )
     */
    private $inScaleX = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="inscaley", type="integer", nullable=true )
     */
    private $inScaleY = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="outoffsetx", type="integer", nullable=true )
     */
    private $outOffsetX = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="outoffsety", type="integer", nullable=true )
     */
    private $outOffsetY = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="outduration", type="integer", nullable=true )
     */
    private $outDuration = 1000;

    /**
     * @var integer
     *
     * @ORM\Column(name="outdelay", type="integer", nullable=true )
     */
    private $outDelay = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="outrotate", type="integer", nullable=true )
     */
    private $outRotate = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="outscalex", type="integer", nullable=true )
     */
    private $outScaleX = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="outscaley", type="integer", nullable=true )
     */
    private $outScaleY = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="parallax", type="integer", nullable=true )
     */
    private $parallax = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255, nullable=true)
     */
    private $content;  

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;    

        /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="product_element", fileNameProperty="imageName")
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
     * @ORM\ManyToOne(targetEntity="SW\SliderBundle\Entity\Slide", inversedBy="elements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $slide;


    public function __construct()
    {
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
     * Set genre
     *
     * @param string $genre
     * @return Element
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set positionTop
     *
     * @param string $positionTop
     * @return Element
     */
    public function setPositionTop($positionTop)
    {
        $this->positionTop = $positionTop;

        return $this;
    }

    /**
     * Get positionTop
     *
     * @return string 
     */
    public function getPositionTop()
    {
        return $this->positionTop;
    }

    /**
     * Set positionLeft
     *
     * @param string $positionLeft
     * @return Element
     */
    public function setPositionLeft($positionLeft)
    {
        $this->positionLeft = $positionLeft;

        return $this;
    }

    /**
     * Get positionLeft
     *
     * @return string 
     */
    public function getPositionLeft()
    {
        return $this->positionLeft;
    }

    /**
     * Set background
     *
     * @param string $background
     * @return Element
     */
    public function setBackground($background)
    {
        $this->background = $background;

        return $this;
    }

    /**
     * Get background
     *
     * @return string 
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Element
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set inOffsetX
     *
     * @param integer $inOffsetX
     * @return Element
     */
    public function setInOffsetX($inOffsetX)
    {
        $this->inOffsetX = $inOffsetX;

        return $this;
    }

    /**
     * Get inOffsetX
     *
     * @return integer 
     */
    public function getInOffsetX()
    {
        return $this->inOffsetX;
    }

    /**
     * Set inOffsetY
     *
     * @param integer $inOffsetY
     * @return Element
     */
    public function setInOffsetY($inOffsetY)
    {
        $this->inOffsetY = $inOffsetY;

        return $this;
    }

    /**
     * Get inOffsetY
     *
     * @return integer 
     */
    public function getInOffsetY()
    {
        return $this->inOffsetY;
    }

    /**
     * Set inDuration
     *
     * @param integer $inDuration
     * @return Element
     */
    public function setInDuration($inDuration)
    {
        $this->inDuration = $inDuration;

        return $this;
    }

    /**
     * Get inDuration
     *
     * @return integer 
     */
    public function getInDuration()
    {
        return $this->inDuration;
    }

    /**
     * Set inDelay
     *
     * @param integer $inDelay
     * @return Element
     */
    public function setInDelay($inDelay)
    {
        $this->inDelay = $inDelay;

        return $this;
    }

    /**
     * Get inDelay
     *
     * @return integer 
     */
    public function getInDelay()
    {
        return $this->inDelay;
    }

    /**
     * Set inRotate
     *
     * @param integer $inRotate
     * @return Element
     */
    public function setInRotate($inRotate)
    {
        $this->inRotate = $inRotate;

        return $this;
    }

    /**
     * Get inRotate
     *
     * @return integer 
     */
    public function getInRotate()
    {
        return $this->inRotate;
    }

    /**
     * Set inScaleX
     *
     * @param integer $inScaleX
     * @return Element
     */
    public function setInScaleX($inScaleX)
    {
        $this->inScaleX = $inScaleX;

        return $this;
    }

    /**
     * Get inScaleX
     *
     * @return integer 
     */
    public function getInScaleX()
    {
        return $this->inScaleX;
    }

    /**
     * Set inScaleY
     *
     * @param integer $inScaleY
     * @return Element
     */
    public function setInScaleY($inScaleY)
    {
        $this->inScaleY = $inScaleY;

        return $this;
    }

    /**
     * Get inScaleY
     *
     * @return integer 
     */
    public function getInScaleY()
    {
        return $this->inScaleY;
    }

    /**
     * Set outOffsetX
     *
     * @param integer $outOffsetX
     * @return Element
     */
    public function setOutOffsetX($outOffsetX)
    {
        $this->outOffsetX = $outOffsetX;

        return $this;
    }

    /**
     * Get outOffsetX
     *
     * @return integer 
     */
    public function getOutOffsetX()
    {
        return $this->outOffsetX;
    }

    /**
     * Set outOffsetY
     *
     * @param integer $outOffsetY
     * @return Element
     */
    public function setOutOffsetY($outOffsetY)
    {
        $this->outOffsetY = $outOffsetY;

        return $this;
    }

    /**
     * Get outOffsetY
     *
     * @return integer 
     */
    public function getOutOffsetY()
    {
        return $this->outOffsetY;
    }

    /**
     * Set outDuration
     *
     * @param integer $outDuration
     * @return Element
     */
    public function setOutDuration($outDuration)
    {
        $this->outDuration = $outDuration;

        return $this;
    }

    /**
     * Get outDuration
     *
     * @return integer 
     */
    public function getOutDuration()
    {
        return $this->outDuration;
    }

    /**
     * Set outDelay
     *
     * @param integer $outDelay
     * @return Element
     */
    public function setOutDelay($outDelay)
    {
        $this->outDelay = $outDelay;

        return $this;
    }

    /**
     * Get outDelay
     *
     * @return integer 
     */
    public function getOutDelay()
    {
        return $this->outDelay;
    }

    /**
     * Set outRotate
     *
     * @param integer $outRotate
     * @return Element
     */
    public function setOutRotate($outRotate)
    {
        $this->outRotate = $outRotate;

        return $this;
    }

    /**
     * Get outRotate
     *
     * @return integer 
     */
    public function getOutRotate()
    {
        return $this->outRotate;
    }

    /**
     * Set outScaleX
     *
     * @param integer $outScaleX
     * @return Element
     */
    public function setOutScaleX($outScaleX)
    {
        $this->outScaleX = $outScaleX;

        return $this;
    }

    /**
     * Get outScaleX
     *
     * @return integer 
     */
    public function getOutScaleX()
    {
        return $this->outScaleX;
    }

    /**
     * Set outScaleY
     *
     * @param integer $outScaleY
     * @return Element
     */
    public function setOutScaleY($outScaleY)
    {
        $this->outScaleY = $outScaleY;

        return $this;
    }

    /**
     * Get outScaleY
     *
     * @return integer 
     */
    public function getOutScaleY()
    {
        return $this->outScaleY;
    }

    /**
     * Set parallax
     *
     * @param integer $parallax
     * @return Element
     */
    public function setParallax($parallax)
    {
        $this->parallax = $parallax;

        return $this;
    }

    /**
     * Get parallax
     *
     * @return integer 
     */
    public function getParallax()
    {
        return $this->parallax;
    }

    /**
     * Set image
     *
     * @param \SW\MediaBundle\Entity\Media $image
     * @return Element
     */
    public function setImage(\SW\MediaBundle\Entity\Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \SW\MediaBundle\Entity\Media 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set slide
     *
     * @param \SW\SliderBundle\Entity\Element $slide
     * @return Element
     */
    public function setSlide(\SW\SliderBundle\Entity\Slide $slide)
    {
        $this->slide = $slide;

        return $this;
    }

    /**
     * Get slide
     *
     * @return \SW\SliderBundle\Entity\Element 
     */
    public function getSlide()
    {
        return $this->slide;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Element
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Element
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
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
