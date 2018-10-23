<?php

namespace TI\PlatformBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Advert
 * @ORM\Table(name="advert")
 * @ORM\Entity(repositoryClass="TI\PlatformBundle\Repository\AdvertRepository")
 */
class Advert
{
    public function __construct()
    {
        $this->date = new \DateTime();
        $this->weightCategories = new ArrayCollection();
        $this->Applications = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="TI\PlatformBundle\Entity\Application", mappedBy="advert", cascade={"remove"})
     */
    private $applications;

    /**
     * @ORM\Column(name="nb_applications", type="integer")
     */
    private $nbApplications = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetimetz")
     */
    private $date;

    /**
     * @var string
     * @Assert\Length(min=8)
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var string
     * @Assert\Length(min=2)
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var string
     * @Assert\Email
     * @ORM\Column(name="email", type="string", length=255, unique=false)
     */
    private $email;

    /**
     * @ORM\ManyToMany(targetEntity="TI\PlatformBundle\Entity\WeightCategory", cascade={"persist"})
     */
    private $weightCategories;


    //______________________________________________Getters & Setters


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Advert
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Advert
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Advert
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Advert
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
     * Set email
     *
     * @param string $email
     *
     * @return Advert
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Advert
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Add application
     *
     * @param \TI\PlatformBundle\Entity\Application $application
     *
     * @return Advert
     */
    public function addApplication(\TI\PlatformBundle\Entity\Application $application)
    {
        $this->applications[] = $application;
        $application->setAdvert($this);
        return $this;
    }

    /**
     * Remove application
     *
     * @param \TI\PlatformBundle\Entity\Application $application
     */
    public function removeApplication(\TI\PlatformBundle\Entity\Application $application)
    {
        $this->applications->removeElement($application);
    }

    /**
     * Get applications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getApplications()
    {
        return $this->applications;
    }

    /**
     * Add weightCategory
     *
     * @param \TI\PlatformBundle\Entity\WeightCategory $weightCategory
     *
     * @return Advert
     */
    public function addWeightCategory(\TI\PlatformBundle\Entity\WeightCategory $weightCategory)
    {
        $this->weightCategories[] = $weightCategory;

        return $this;
    }

    /**
     * Remove weightCategory
     *
     * @param \TI\PlatformBundle\Entity\WeightCategory $weightCategory
     */
    public function removeWeightCategory(\TI\PlatformBundle\Entity\WeightCategory $weightCategory)
    {
        $this->weightCategories->removeElement($weightCategory);
    }

    /**
     * Get weightCategories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWeightCategories()
    {
        return $this->weightCategories;
    }

    public function getNbApplications()
    {
        return $this->nbApplications;
    }

    public function setNbApplications($nbApplications)
    {
        $this->nbApplications = $nbApplications;
    }

    public function increaseApplications()
    {
        $this->nbApplications++;
    }

    public function decreaseApplications()
    {
        $this->nbApplications--;
    }
}
