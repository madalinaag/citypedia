<?php

namespace AppBundle\Entity\Tourit;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\Annotation\XmlAttribute;

class Hotel
{
    /**
     * @JMS\Type("string")
     * @XmlAttribute
     */
    private $code;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     * @JMS\SerializedName("destCode")
     */
    private $destCode;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     */
    private $city;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     */
    private $region;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     */
    private $country;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     */
    private $name;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     */
    private $category;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     */
    private $room;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     * @JMS\SerializedName("roomDescription")
     */
    private $roomDescription;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     * @JMS\SerializedName("bookBeds")
     */
    private $bookBeds;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     */
    private $maintenance;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     * @JMS\SerializedName("maintenceDescription")
     */
    private $maintenceDescription;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     * @JMS\SerializedName("minAdults")
     */
    private $minAdults;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     * @JMS\SerializedName("maxAdults")
     */
    private $maxAdults;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     * @JMS\SerializedName("minPersons")
     */
    private $minPersons;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     * @JMS\SerializedName("maxPersons")
     */
    private $maxPersons;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     * @JMS\SerializedName("defPersons")
     */
    private $defPersons;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     * @JMS\SerializedName("hMCode")
     */
    private $hMCode;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     * @JMS\SerializedName("basePrice")
     */
    private $basePrice;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getDestCode()
    {
        return $this->destCode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return mixed
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @return mixed
     */
    public function getRoomDescription()
    {
        return $this->roomDescription;
    }

    /**
     * @return mixed
     */
    public function getBookBeds()
    {
        return $this->bookBeds;
    }

    /**
     * @return mixed
     */
    public function getMaintenance()
    {
        return $this->maintenance;
    }

    /**
     * @return mixed
     */
    public function getMaintenceDescription()
    {
        return $this->maintenceDescription;
    }

    /**
     * @return mixed
     */
    public function getMinAdults()
    {
        return $this->minAdults;
    }

    /**
     * @return mixed
     */
    public function getMaxAdults()
    {
        return $this->maxAdults;
    }

    /**
     * @return mixed
     */
    public function getMinPersons()
    {
        return $this->minPersons;
    }

    /**
     * @return mixed
     */
    public function getMaxPersons()
    {
        return $this->maxPersons;
    }

    /**
     * @return mixed
     */
    public function getDefPersons()
    {
        return $this->defPersons;
    }

    /**
     * @return mixed
     */
    public function getHMCode()
    {
        return $this->hMCode;
    }

    /**
     * @return mixed
     */
    public function getBasePrice()
    {
        return $this->basePrice;
    }


}