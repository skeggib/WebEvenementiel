<?php

namespace WebEvents\Actions;

use WebEvents\Database\IDAOUser;
use WebEvents\Response;
use WebEvents\Validation\ValidatorName;
use WebEvents\Validation\ValidatorEmail;
use WebEvents\Validation\ValidatorPassword;
use WebEvents\Exceptions\InvalidParameterException;
use WebEvents\Models\User;

/**
 * Sign-up a new user
 */
class ActionSignUp extends Action
{
    private $dao;

    private $login;
    private $email;
    private $password;
    private $firstname;
    private $lastname;
    private $civility;
    private $birthday;
    private $cellphone;
    private $adressId;
    private $active;

    public function __construct(IDAOUser $dao,
                                $username,
                                $email,
                                $password,
                                $firstname,
                                $lastname,
                                $civility,
                                $birthday,
                                $cellphone,
                                $adressId,
                                $active)
    {
        $this->dao = $dao;

        $this->login = $username;
        $this->email = $email;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->civility = $civility;
        $this->birthday = $birthday;
        $this->cellphone = $cellphone;
        $this->adressId = $adressId;
        $this->active = $active;
    }

    public function execute()
    {
        $nameValidator = new ValidatorName();
        $emailValidator = new ValidatorEmail();
        $passwordValidator = new ValidatorPassword();

        if (!$nameValidator->validate($this->login))
            throw new InvalidParameterException("login","Invalid login");
        if ($this->dao->exists($this->login))
            throw new InvalidParameterException("login", "User already exists");

        if (!$passwordValidator->validate($this->password))
            throw new InvalidParameterException("password","Invalid password");

        if (!$nameValidator->validate($this->firstname))
            throw new InvalidParameterException("firstname","Invalid first name");

        if (!$nameValidator->validate($this->lastname))
            throw new InvalidParameterException("lastname","Invalid last name");

        if (!$emailValidator->validate($this->email))
            throw new InvalidParameterException("email","Invalid email");

        // TODO Civility validation
        // TODO Birthday validation
        // TODO Cellphone validation
        // TODO Adress validation

        $user = new User(
            0,
            $this->login,
            $this->email,
            $this->firstname,
            $this->lastname,
            true,
            $this->password,
            $this->civility,
            $this->birthday,
            $this->cellphone,
            "", // TODO address
            ""
        );

        $added = $this->dao->add($user);

        if (!$added)
            return new Response(array(), true); // TODO:skeggib Error code
        return new Response(array(), false);
    }
}
