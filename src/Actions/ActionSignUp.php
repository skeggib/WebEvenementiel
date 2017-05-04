<?php

namespace WebEvents\Actions;

require_once(__DIR__ . "/Action.php");
require_once(__DIR__ . "/../Exceptions/NotImplementedException.php");

require_once(__DIR__ . "/../Database/IDAOSignUp.php");
use WebEvents\Database\IDAOSignUp;
require_once(__DIR__ . "/../Response.php");
use WebEvents\Response;

require_once __DIR__ . "/../Validation/ValidatorName.php";
use WebEvents\Validation\ValidatorName;
require_once __DIR__ . "/../Validation/ValidatorEmail.php";
use WebEvents\Validation\ValidatorEmail;
require_once __DIR__ . "/../Validation/ValidatorPassword.php";
use WebEvents\Validation\ValidatorPassword;

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

    public function __construct(IDAOSignUp $dao,
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
            throw new \InvalidParameterException("login","Invalid login");
        if ($this->dao->exists($this->login))
            throw new \InvalidParameterException("login", "User exists");

        if (!$passwordValidator->validate($this->password))
            throw new \InvalidParameterException("password","Invalid password");

        if (!$nameValidator->validate($this->firstname))
            throw new \InvalidParameterException("firstname","Invalid first name");

        if (!$nameValidator->validate($this->lastname))
            throw new \InvalidParameterException("lastname","Invalid last name");

        if (!$emailValidator->validate($this->email))
            throw new \InvalidParameterException("email","Invalid email");

        // TODO Civility validation
        // TODO Birthday validation
        // TODO Cellphone validation
        // TODO Adress validation

        $added = $this->dao->signup($this->login,
                                    $this->email,
                                    $this->password,
                                    $this->firstname,
                                    $this->lastname,
                                    $this->civility,
                                    $this->birthday,
                                    $this->cellphone,
                                    $this->adressId,
                                    $this->active);

        if (!$added)
            return new Response(array(), true); // TODO:skeggib Error code
        return new Response(array(), false);
    }
}
