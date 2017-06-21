<?php
/**
 * Created by PhpStorm.
 * User: Madalina
 * Date: 12/11/2016
 * Time: 6:31 PM
 */

namespace AppBundle\Entity\App;

use AppBundle\Entity\Supers\IdentifiableTrait;
use AppBundle\Entity\Supers\TemporalTrait;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
/**
 * @ORM\Table("keyword")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\KeywordRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 */
class Keyword
{
    use TemporalTrait, IdentifiableTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     *
     */
    private $name;

    /**
     * @var Places
     *
     * @ORM\ManyToMany(targetEntity="Place", mappedBy="keywords")
     */
    private $places;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->places = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Keyword
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
     * Add place
     *
     * @param \AppBundle\Entity\App\Place $place
     *
     * @return Keyword
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
