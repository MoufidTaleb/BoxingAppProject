<?php

namespace TI\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Application
 *
 * @ORM\Table(name="application")
 * @ORM\Entity(repositoryClass="TI\PlatformBundle\Repository\ApplicationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Application
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    public function __construct()
    {
        $this->date = new \Datetime();
    }

    /**
     * @ORM\ManyToOne(targetEntity="TI\UserBundle\Entity\User", inversedBy="applications"))
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetimetz")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="TI\PlatformBundle\Entity\Advert", cascade={"persist"}, inversedBy="applications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $advert;

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
     * Set content
     *
     * @param string $content
     *
     * @return Application
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Application
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
     * Set advert
     *
     * @param \TI\PlatformBundle\Entity\Advert $advert
     *
     * @return Application
     */
    public function setAdvert(\TI\PlatformBundle\Entity\Advert $advert)
    {
        $this->advert = $advert;

        return $this;
    }

    /**
     * Get advert
     *
     * @return \TI\PlatformBundle\Entity\Advert
     */
    public function getAdvert()
    {
        return $this->advert;
    }

    /*
     * @ORM\PreRemove
     */
    public function purgeFromAdvert()
    {
        $this->getAdvert()->removeApplication($this);
    }

    /**
     * @ORM\PrePersist
     */
    public function increase()
    {
        $this->getAdvert()->increaseApplications();
    }

    /**
     * @ORM\PreRemove
     */
    public function decrease()
    {
        $this->getAdvert()->decreaseApplications();
    }

    /**
     * Set user.
     *
     * @param \TI\UserBundle\Entity\User $user
     *
     * @return Application
     */
    public function setUser(\TI\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \TI\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
