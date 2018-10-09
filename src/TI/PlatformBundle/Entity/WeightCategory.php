<?php

namespace TI\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WeightCategory
 *
 * @ORM\Table(name="weight_category")
 * @ORM\Entity(repositoryClass="TI\PlatformBundle\Repository\WeightCategoryRepository")
 */
class WeightCategory
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="minWeight", type="integer")
     */
    private $minWeight;

    /**
     * @var int
     *
     * @ORM\Column(name="MaxWeight", type="integer")
     */
    private $maxWeight;


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
     * Set name
     *
     * @param string $name
     *
     * @return WeightCategory
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
     * Set minWeight
     *
     * @param integer $minWeight
     *
     * @return WeightCategory
     */
    public function setMinWeight($minWeight)
    {
        $this->minWeight = $minWeight;

        return $this;
    }

    /**
     * Get minWeight
     *
     * @return int
     */
    public function getMinWeight()
    {
        return $this->minWeight;
    }

    /**
     * Set maxWeight
     *
     * @param integer $maxWeight
     *
     * @return WeightCategory
     */
    public function setMaxWeight($maxWeight)
    {
        $this->maxWeight = $maxWeight;

        return $this;
    }

    /**
     * Get maxWeight
     *
     * @return int
     */
    public function getMaxWeight()
    {
        return $this->maxWeight;
    }
}

