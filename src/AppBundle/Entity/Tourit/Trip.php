<?php

namespace AppBundle\Entity\Tourit;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use JMS\Serializer\Annotation\XmlRoot;


class Trip
{
    /**
     * @JMS\Type("string")
     * @XmlAttribute
     */
    private $date;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     */
    private $period;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     */
    private $catalog;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     */
    private $template;

    /**
     * @JMS\Type("string")
     */
    private $trip;

    /**
     * @var Hotel
     * @JMS\Type("AppBundle\Entity\Tourit\Hotel")
     */
    private $hotel;

    /**
     * @JMS\Type("AppBundle\Entity\Tourit\Price")
     */
    private $price;

    public function __construct()
    {
        $this->hotel = new Hotel();
        $this->price = new Price();
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @return mixed
     */
    public function getCatalog()
    {
        return $this->catalog;
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @return mixed
     */
    public function getTrip()
    {
        return $this->trip;
    }

    /**
     * @return Hotel
     */
    public function getHotel()
    {
        return $this->hotel;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }
}