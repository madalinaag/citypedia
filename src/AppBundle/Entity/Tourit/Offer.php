<?php

namespace AppBundle\Entity\Tourit;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\SerializedName;

/** @XmlRoot("priceList") */
class Offer
{
    /**
     * @JMS\Type("string")
     * @XmlAttribute
     * @JMS\SerializedName("tourOperator")
     */
    private $tourOperator;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     * @JMS\SerializedName("priceType")
     */
    private $priceType;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     * @JMS\SerializedName("timeStamp")
     */
    private $timeStamp;

    /**
     * @JMS\Type("ArrayCollection<AppBundle\Entity\Tourit\Trip>")
     * @JMS\XmlList(entry="trip")
     */
    private $priceList;

    public function __construct()
    {
        $this->priceList = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getTourOperator()
    {
        return $this->tourOperator;
    }

    /**
     * @return mixed
     */
    public function getPriceType()
    {
        return $this->priceType;
    }

    /**
     * @return mixed
     */
    public function getTimeStamp()
    {
        return $this->timeStamp;
    }

    /**
     * @return mixed
     */
    public function getPriceList()
    {
        return $this->priceList;
    }
}