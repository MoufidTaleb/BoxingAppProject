<?php

namespace TI\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="TI\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="TI\PlatformBundle\Entity\WeightCategory", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $weightCategories;

    /**
     * @ORM\OneToMany(targetEntity="TI\PlatformBundle\Entity\Advert", cascade={"remove"}, mappedBy="user")
     */
    private $adverts;

    /**
     * @ORM\OneToMany(targetEntity="TI\PlatformBundle\Entity\Application", cascade={"remove"}, mappedBy="user")
     */
    private $applications;

    /**
     * @var string
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * Set location.
     *
     * @param string $location
     *
     * @return User
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location.
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Add weightCategory.
     *
     * @param \TI\PlatformBundle\Entity\WeightCategory $weightCategory
     *
     * @return User
     */
    public function addWeightCategory(\TI\PlatformBundle\Entity\WeightCategory $weightCategory)
    {
        $this->weightCategories[] = $weightCategory;

        return $this;
    }

    /**
     * Remove weightCategory.
     *
     * @param \TI\PlatformBundle\Entity\WeightCategory $weightCategory
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeWeightCategory(\TI\PlatformBundle\Entity\WeightCategory $weightCategory)
    {
        return $this->weightCategories->removeElement($weightCategory);
    }

    /**
     * Get weightCategories.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWeightCategories()
    {
        return $this->weightCategories;
    }

    /**
     * Add advert.
     *
     * @param \TI\PlatformBundle\Entity\Advert $advert
     *
     * @return User
     */
    public function addAdvert(\TI\PlatformBundle\Entity\Advert $advert)
    {
        $this->adverts[] = $advert;

        return $this;
    }

    /**
     * Remove advert.
     *
     * @param \TI\PlatformBundle\Entity\Advert $advert
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAdvert(\TI\PlatformBundle\Entity\Advert $advert)
    {
        return $this->adverts->removeElement($advert);
    }

    /**
     * Get adverts.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdverts()
    {
        return $this->adverts;
    }

    /**
     * Add application.
     *
     * @param \TI\PlatformBundle\Entity\Application $application
     *
     * @return User
     */
    public function addApplication(\TI\PlatformBundle\Entity\Application $application)
    {
        $this->applications[] = $application;

        return $this;
    }

    /**
     * Remove application.
     *
     * @param \TI\PlatformBundle\Entity\Application $application
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeApplication(\TI\PlatformBundle\Entity\Application $application)
    {
        return $this->applications->removeElement($application);
    }

    /**
     * Get applications.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getApplications()
    {
        return $this->applications;
    }
}
