<?php

namespace WebEvents\Actions;

require_once(__DIR__ . "/Action.php");
require_once(__DIR__ . "/../Exceptions/NotImplementedException.php");

require_once(__DIR__ . "/../Database/IDAOSignUp.php");
use WebEvents\Database\IDAOSignUp;

/**
 * Sign-up a new user
 */
class ActionSignUp extends Action
{
    private $dao;

    public function __construct(IDAOSignUp $dao,
                                string $login,
								string $password,
								string $firstname,
								string $lastname,
								string $email)
    {
        $this->dao = $dao;
    }

    public function execute()
    {
        throw new \NotImplementedException();
    }
}
