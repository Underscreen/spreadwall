<?php

namespace SW\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Activity
 *
 * @ORM\Table(name="activity")
 * @ORM\Entity(repositoryClass="SW\UserBundle\Entity\ActivityRepository")
 */
class Activity
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
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="string", length=255)
     */
    private $detail;

    /**
     * @ORM\ManyToOne(targetEntity="SW\UserBundle\Entity\Category", inversedBy="activities")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="SW\UserBundle\Entity\Style", mappedBy="activity")
    */
    private $styles;

    /**
     * @var integer
     *
     * @ORM\Column(name="parent", type="integer")
     * 
     */
    private $parent;


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
     * @return Activity
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
     * Set slug
     *
     * @param string $slug
     * @return Activity
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set detail
     *
     * @param string $detail
     * @return Activity
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string 
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set category
     *
     * @param \SW\UserBundle\Entity\Category $category
     * @return Activity
     */
    public function setCategory(\SW\UserBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \SW\UserBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set parent
     *
     * @param integer $parent
     * @return Activity
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return integer 
     */
    public function getParent()
    {
        return $this->parent;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->styles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add styles
     *
     * @param \SW\UserBundle\Entity\Style $styles
     * @return Activity
     */
    public function addStyle(\SW\UserBundle\Entity\Style $styles)
    {
        $this->styles[] = $styles;

        return $this;
    }

    /**
     * Remove styles
     *
     * @param \SW\UserBundle\Entity\Style $styles
     */
    public function removeStyle(\SW\UserBundle\Entity\Style $styles)
    {
        $this->styles->removeElement($styles);
    }

    /**
     * Get styles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStyles()
    {
        return $this->styles;
    }
}
