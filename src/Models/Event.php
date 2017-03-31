<?php

namespace WebEvent\Models;

require_once(__DIR__ . "/Address.php");

public class Event
{
    private     $id;            //int
    private     $name;          //String
    private     $beginDate;     //DateTime
    private     $endDate;       //DateTime
    private     $actif          //Bool
    private     $comment        //String

    private     $address        //Address

    public function __construct($id,
                                $name,
                                $beginDate,
                                $endDate,
                                $actif,
                                $comment,
                                $address)
    {
        this->$id = $id;
        this->$name = $name;
        this->$beginDate = $beginDate;
        this->$endDate = $endDate;
        this->$actif = $actif;
        this->$comment = $comment;
        this->$address = $address;
    }

    public function getId()
    {
        return this->$id;
    }

    public function getName()
    {
        return this->$name;
    }

    public function setName($name)
    {
        this->$name = $name;
    }

    public function getBeginDate()
    {
        return this->$beginDate;
    }

    public function setBeginDate($beginDate)
    {
        this->$beginDate = $beginDate;
    }

    public function getEndDate()
    {
        return this->$endDate;
    }

    public function setEndDate($endDate)
    {
        this->$endDate = $endDate;
    }

    public function getActif()
    {
        return this->$actif;
    }

    public function setActif($actif)
    {
        this->$actif = $actif;
    }

    public function getComment()
    {
        return this->$comment;
    }

    public function setComment($comment)
    {
        this->$comment = $comment; 
    }

    public function getAddress()
    {
        return this->$address;
    }

    public function setAddress($address)
    {
        this->$address = $address;
    }
}
