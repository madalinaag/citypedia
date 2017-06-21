<?php
/**
 * Created by PhpStorm.
 * User: Madalina
 * Date: 27/10/2016
 * Time: 9:53 PM
 */

namespace AppBundle\Entity\App;

use AppBundle\Entity\Supers\IdentifiableTrait;
use AppBundle\Entity\Supers\TemporalTrait;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
/**
 * Class Category
 * @package AppBundle\Entity\App
 * @ORM\Table("category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Category
{
    use TemporalTrait, IdentifiableTrait;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var Place
     *
     * @ORM\OneToMany(targetEntity="Place", mappedBy="category")
     */
    private $places;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Category
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
     * Constructor
     */
    public function __construct()
    {
        $this->places = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add place
     *
     * @param \AppBundle\Entity\App\Place $place
     *
     * @return Category
     */
    public function addPlace(\AppBundle\Entity\App\Place $place)
    {
        $this->places[] = $place;

        return $this;
    }

    /**
     * Remove place
     *
     * @param \AppBundle\Entity\App\Place $place
     */
    public function removePlace(\AppBundle\Entity\App\Place $place)
    {
        $this->places->removeElement($place);
    }

    /**
     * Get places
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlaces()
    {
        return $this->places;
    }
}
