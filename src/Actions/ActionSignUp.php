<?php

namespace WebEvents\Actions;

require_once(__DIR__ . "/Action.php");
require_once(__DIR__ . "/../Exceptions/NotImplementedException.php");

require_once(__DIR__ . "/../Database/IDAOSignUp.php");
use WebEvents\Database\IDAOSignUp;
require_once(__DIR__ . "/../Response.php");
use WebEvents\Response;

/**
 * Sign-up a new user
 */
class ActionSignUp extends Action
{
    private $dao;

    private $username;
    private $email;
    private $password;
    private $firstname;
    private $lastname;
    private $civility;
    private $birthday;
    private $cellphone;
    private $cp;

    public function __construct(IDAOSignUp $dao,
                                $username,
                                $email,
                                $password,
                                $firstname,
                                $lastname,
                                $civility,
                                $birthday,
                                $cellphone,
                                $cp)
    {
        $this->dao = $dao;

        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->civility = $civility;
        $this->birthday = $birthday;
        $this->cellphone = $cellphone;
        $this->cp = $cp;
    }

    public function execute()
    {
        $added = $this->dao->signup($this->username,
                                    $this->email,
                                    $this->password,
                                    $this->firstname,
                                    $this->lastname,
                                    $this->civility,
                                    $this->birthday,
                                    $this->cellphone
                                    $this->cp,
                                    $this->town);

        if (!$added)
            return new Response(array(), true); // TODO:skeggib Error code
        return new Response(array(), false);
    }
}
