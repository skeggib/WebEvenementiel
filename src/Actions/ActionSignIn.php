<?php

namespace WebEvents\Actions;

require_once("Action.php");

require_once("src/Database/IDAOSignIn.php");
use WebEvents\Database\IDAOSignIn;

/**
 * Sign-in an user
 */
class ActionSignIn extends Action
{
	private $dao;

	public function __construct(IDAOSignIn $dao, string $login, string $password)
    {
    	$this->dao = $dao;
	}

	public function execute()
    {
		throw new \Exception("Not implemented");
	}
}
