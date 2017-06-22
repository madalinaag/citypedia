<?php

namespace AppBundle\Entity\Tourit;

use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\Annotation\XmlAttribute;

class Price
{
    /**
     * @JMS\Type("string")
     * @XmlAttribute
     */
    private $adult;

    /**
     * @JMS\Type("string")
     * @XmlAttribute
     */
    private $currency;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getAdult()
    {
        return $this->adult;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }


}