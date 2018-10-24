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
}
