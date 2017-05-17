<?php

namespace WebEvents\Models;

class User
{
    private $id;
    private $username;
    private $email;
    private $lastName;
    private $firstName;
    private $active;
    private $password;
    private $civility;
    private $birthday;
    private $cellphone;
    private $address;

    public function __construct($id,
                                $username,
                                $email,
                                $firstName,
                                $lastName,
                                $active,
                                $password,
                                $civility,
                                $birthday,
                                $cellphone,
                                Address $address)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->active = $active;
        $this->password = $password;
        $this->civility = $civility;
        $this->birthday = $birthday;
        $this->cellphone = $cellphone;
        $this->address = $address;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getCivility()
    {
        return $this->civility;
    }

    public function setCivility($civility)
    {
        $this->civility = $civility;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function getCellphone()
    {
        return $this->cellphone;
    }

    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }
}