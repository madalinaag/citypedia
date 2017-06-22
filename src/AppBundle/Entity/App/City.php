<?php

namespace AppBundle\Entity\App;

use AppBundle\Entity\Supers\IdentifiableTrait;
use AppBundle\Entity\Supers\TemporalTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Table("city")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CityRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class City
{
    use TemporalTrait, IdentifiableTrait;

    /**
     * @var Country
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\App\Country")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="code")
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Place", mappedBy="city")
     */
    private $places;

    /**
     * @return Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param Country $country
     * @return City
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return City
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * @return string
     */
    public function __toString()
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
     * @return City
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
