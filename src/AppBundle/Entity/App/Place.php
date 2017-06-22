<?php
/**
 * Created by PhpStorm.
 * User: Madalina
 * Date: 27/10/2016
 * Time: 5:22 PM
 */

namespace AppBundle\Entity\App;

use AppBundle\Entity\Supers\IdentifiableTrait;
use AppBundle\Entity\Supers\TemporalTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
/**
 * @ORM\Table("place")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlaceRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 */
class Place
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
     * @var City
     *
     * @ORM\ManyToOne(targetEntity="City", inversedBy="places")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     */
    private $city;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     *
     */
    private $address;

    /**
     * @var string
     * @ORM\Column(type="string", length=6, nullable=false)
     *
     */
    private $zip;

    /**
     * @var string
     * @ORM\Column(type="string", length=10)
     *
     */
    private $phone;

    /**
     * @var string
     * @ORM\Column(name="web_address", type="string", length=255)
     *
     */
    private $webAddress;

    /**
     * @var string
     * @ORM\Column(name="open_hours", type="string", length=255)
     *
     */
    private $openHours;

    /**
     * @var ArrayCollection
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\App\Category", inversedBy="places")
     *
     */
    private $category;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     *
     */
    private $description;

    /**
     * @var boolean
     * @ORM\Column(name="is_claimed", type="boolean")
     */
    private $isClaimed;

    /**
     * @var boolean
     * @ORM\Column(name="is_closed", type="boolean")
     */
    private $isClosed;

    /**
     * @var string
     * @ORM\Column(name="coord_latitude", type="string", length=255)
     *
     */
    private $coordLatitude;

    /**
     * @var string
     * @ORM\Column(name="coord_longitude", type="string", length=255)
     *
     */
    private $coordLongitude;

    /**
     * @var string
     * @ORM\Column(name="image_url", type="string", length=255)
     *
     */
    private $imageUrl;

    /**
     * @var Keyword
     *
     * @ORM\ManyToMany(targetEntity="Keyword", inversedBy="places")
     * @ORM\JoinTable("place_keyword")
     */
    private $keywords;

    /**
     * @var int
     * @ORM\Column(name="gmap_id", type="integer", nullable=true)
     */
    private $gMapId;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->keywords = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Place
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
     * Set address
     *
     * @param string $address
     *
     * @return Place
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zip
     *
     * @param string $zip
     *
     * @return Place
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Place
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set webAddress
     *
     * @param string $webAddress
     *
     * @return Place
     */
    public function setWebAddress($webAddress)
    {
        $this->webAddress = $webAddress;

        return $this;
    }

    /**
     * Get webAddress
     *
     * @return string
     */
    public function getWebAddress()
    {
        return $this->webAddress;
    }

    /**
     * Set openHours
     *
     * @param string $openHours
     *
     * @return Place
     */
    public function setOpenHours($openHours)
    {
        $this->openHours = $openHours;

        return $this;
    }

    /**
     * Get openHours
     *
     * @return string
     */
    public function getOpenHours()
    {
        return $this->openHours;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Place
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set isClaimed
     *
     * @param boolean $isClaimed
     *
     * @return Place
     */
    public function setIsClaimed($isClaimed)
    {
        $this->isClaimed = $isClaimed;

        return $this;
    }

    /**
     * Get isClaimed
     *
     * @return boolean
     */
    public function getIsClaimed()
    {
        return $this->isClaimed;
    }

    /**
     * Set isClosed
     *
     * @param boolean $isClosed
     *
     * @return Place
     */
    public function setIsClosed($isClosed)
    {
        $this->isClosed = $isClosed;

        return $this;
    }

    /**
     * Get isClosed
     *
     * @return boolean
     */
    public function getIsClosed()
    {
        return $this->isClosed;
    }

    /**
     * Set coordLatitude
     *
     * @param string $coordLatitude
     *
     * @return Place
     */
    public function setCoordLatitude($coordLatitude)
    {
        $this->coordLatitude = $coordLatitude;

        return $this;
    }

    /**
     * Get coordLatitude
     *
     * @return string
     */
    public function getCoordLatitude()
    {
        return $this->coordLatitude;
    }

    /**
     * Set coordLongitude
     *
     * @param string $coordLongitude
     *
     * @return Place
     */
    public function setCoordLongitude($coordLongitude)
    {
        $this->coordLongitude = $coordLongitude;

        return $this;
    }

    /**
     * Get coordLongitude
     *
     * @return string
     */
    public function getCoordLongitude()
    {
        return $this->coordLongitude;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     *
     * @return Place
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set city
     *
     * @param \AppBundle\Entity\App\City $city
     *
     * @return Place
     */
    public function setCity(\AppBundle\Entity\App\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \AppBundle\Entity\App\City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\App\Category $category
     *
     * @return Place
     */
    public function setCategory(\AppBundle\Entity\App\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\App\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add keyword
     *
     * @param \AppBundle\Entity\App\Keyword $keyword
     *
     * @return Place
     */
    public function addKeyword(\AppBundle\Entity\App\Keyword $keyword)
    {
        $this->keywords[] = $keyword;

        return $this;
    }

    /**
     * Remove keyword
     *
     * @param \AppBundle\Entity\App\Keyword $keyword
     */
    public function removeKeyword(\AppBundle\Entity\App\Keyword $keyword)
    {
        $this->keywords->removeElement($keyword);
    }

    /**
     * Get keywords
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set gMapId
     *
     * @param integer $gMapId
     *
     * @return Place
     */
    public function setGMapId($gMapId)
    {
        $this->gMapId = $gMapId;

        return $this;
    }

    /**
     * Get gMapId
     *
     * @return integer
     */
    public function getGMapId()
    {
        return $this->gMapId;
    }
}
