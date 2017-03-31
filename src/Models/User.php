<?php

namespace WebEvent\Models;

require_once(__DIR__ . "/Address.php");

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

    private $cp;
    private $town;

    public function __construct($id,
                                $username,
                                $email,
                                $lastName,
                                $firstName,
                                $active,
                                $password,
                                $civility,
                                $birthday,
                                $cellphone,
                                $cp,
                                $town)
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

    $this->cp = $cp;
    $this->town = $town;
    }
    public function getId()
    {
        return $this->id;
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
    public function setFirstName()
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
    public function setCivility()
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
    public function getCp()
    {
        return $this->cp;
    }
    public function setCp($cp)
    {
        $this->cp = $cp;
    }    
    public function getTown()
    {
        return $this->town;
    }
    public function setTown($town)
    {
        $this->town = $town;
    }
}