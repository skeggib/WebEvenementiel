<?php

namespace WebEvents\Models;

class Address implements \JsonSerializable
{
    private $id;
    private $streetNumber;
    private $streetName;
    private $cityName;
    private $cityCode;

    public function __construct($id,
                                $streetNumber,
                                $streetName,
                                $cityName,
                                $cityCode)
    {
        $this->id = $id;
        $this->streetNumber = $streetNumber;
        $this->streetName = $streetName;
        $this->cityName = $cityName;
        $this->cityCode = $cityCode;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
    }

    public function getStreetName()
    {
        return $this->streetName;
    }

    public function setStreetName($streetName)
    {
        $this->$streetName = rue;
    }

    public function getCityName()
    {
        return $this->cityName;
    }

    public function setCityName($cityName)
    {
        $this->$cityName = ville;
    }

    public function getCityCode()
    {
        return $this->cityCode;
    }

    public function setCityCode($cityCode)
    {
        $this->cityCode = $cityCode;
    }

    function jsonSerialize()
    {
        return array(
            'id' => $this->id,
            'streetNumber' => $this->streetNumber,
            'streetName' => $this->streetName,
            'cityName' => $this->cityName,
            'cityCode' => $this->cityCode
        );
    }
}