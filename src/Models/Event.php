<?php

namespace WebEvents\Models;

class Event implements \JsonSerializable
{
    private $id;
    private $name;
    private $beginDate;
    private $endDate;
    private $beginTime;
    private $endTime;
    private $active;
    private $description;
    private $address;
    private $organizer;

    public function __construct($id,
                                $name,
                                $beginDate,
                                $endDate,
                                $beginTime,
                                $endTime,
                                Address $address,
                                $description,
                                $active,
                                User $organizer)
    {
        $this->id = $id;
        $this->name = $name;
        $this->beginDate = $beginDate;
        $this->endDate = $endDate;
        $this->beginTime = $beginTime;
        $this->endTime = $endTime;
        $this->address = $address;
        $this->description = $description;
        $this->active = $active;
        $this->organizer = $organizer;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getBeginDate()
    {
        return $this->beginDate;
    }

    public function setBeginDate($beginDate)
    {
        $this->beginDate = $beginDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    public function getBeginTime()
    {
        return $this->beginTime;
    }

    public function setBeginTime($beginTime)
    {
        $this->beginTime = $beginTime;
    }

    public function getEndTime()
    {
        return $this->endTime;
    }

    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getOrganizer()
    {
        return $this->organizer;
    }

    public function setOrganizer($organizer)
    {
        $this->organizer = $organizer;
    }

    function jsonSerialize()
    {
        return array(
            'id' => $this->id,
            'name' => $this->name,
            'beginDate' => $this->beginDate,
            'endDate' => $this->endDate,
            'beginTime' => $this->beginTime,
            'endTime' => $this->endTime,
            'active' => $this->active,
            'description' => $this->description,
            'address' => $this->address,
            'organizer' => $this->organizer
        );
    }
}
