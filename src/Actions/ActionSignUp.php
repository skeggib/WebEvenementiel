<?php

namespace WebEvents\Actions;

use WebEvents\Database\IDAOUser;
use WebEvents\Database\IDAOAddress;
use WebEvents\Models\Address;
use WebEvents\Exceptions\InvalidParameterException;
use WebEvents\Models\User;
use WebEvents\Responses\ResponseUser;
use WebEvents\Validation\ValidatorCityCode;
use WebEvents\Validation\ValidatorName;
use WebEvents\Validation\ValidatorEmail;
use WebEvents\Validation\ValidatorPassword;
use WebEvents\Validation\ValidatorDate;

/**
 * Sign-up a new user
 */
class ActionSignUp extends Action
{
    private $daoUser;
    private $daoAddress;

    private $validatorName;
    private $validatorEmail;
    private $validatorPassword;
    private $validatorDate;
    private $validatorCityCode;

    private $login;
    private $email;
    private $password;
    private $firstName;
    private $lastName;
    private $civility;
    private $birthday;
    private $cellphone;
    private $cityCode;
    private $cityName;

    public function __construct(IDAOUser $daoUser,
                                IDAOAddress $daoAddress,
                                $username,
                                $email,
                                $password,
                                $firstName,
                                $lastName,
                                $civility,
                                $birthday,
                                $cellphone,
                                $cityCode,
                                $cityName)
    {
        $this->daoUser = $daoUser;
        $this->daoAddress = $daoAddress;

        $this->validatorName = new ValidatorName();
        $this->validatorEmail = new ValidatorEmail();
        $this->validatorPassword = new ValidatorPassword();
        $this->validatorDate = new ValidatorDate();
        $this->validatorCityCode = new ValidatorCityCode();

        $this->login = $username;
        $this->email = $email;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->civility = $civility;
        $this->birthday = $birthday;
        $this->cellphone = $cellphone;
        $this->cityCode = $cityCode;
        $this->cityName = $cityName;
    }

    public function execute()
    {
        if (!$this->validatorName->validate($this->login))
            throw new InvalidParameterException("login","Invalid login");
        if ($this->daoUser->exists($this->login))
            throw new InvalidParameterException("login", "User already exists");

        if (!$this->validatorPassword->validate($this->password))
            throw new InvalidParameterException("password","Invalid password");

        if (!$this->validatorName->validate($this->firstName))
            throw new InvalidParameterException("firstName","Invalid first name");

        if (!$this->validatorName->validate($this->lastName))
            throw new InvalidParameterException("lastName","Invalid last name");

        if (!$this->validatorEmail->validate($this->email))
            throw new InvalidParameterException("email","Invalid email");

        if ($this->civility != 1 && $this->civility != 2)
            throw new InvalidParameterException("civility","Invalid civility");

        if (!$this->validatorDate->validate($this->birthday))
            throw new InvalidParameterException("birthday","Invalid birthday");

        // TODO Cellphone validation

        if (!$this->validatorCityCode->validate($this->cityCode))
            throw new InvalidParameterException("cityCode");

        if (is_null($this->cityName) || trim($this->cityName) == "")
            throw new InvalidParameterException("cityName");

        // Address

        $address = new Address(0, "", "", $this->cityName, $this->cityCode);
        $address = $this->daoAddress->add($address);

        if (!$address)
            throw new \Exception("Cannot add address");

        // User

        $user = new User(
            0,
            $this->login,
            $this->email,
            $this->firstName,
            $this->lastName,
            true,
            $this->password,
            $this->civility,
            $this->birthday,
            $this->cellphone,
            $address
        );

        $user = $this->daoUser->add($user);

        if (!$user)
            throw new \Exception("Cannot add user");

        return new ResponseUser($user);
    }
}
