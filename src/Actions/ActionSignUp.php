<?php

namespace WebEvents\Actions;

require_once("Action.php");

require_once("src/Database/IDAOSignUp.php");
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
        throw new \Exception("Not implemented");
    }
}
