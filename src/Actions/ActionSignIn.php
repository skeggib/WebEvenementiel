<?php

namespace WebEvents\Actions;

require_once("Action.php");

/**
 * Sign-in an user
 */
class ActionSignIn extends Action
{
	public function __construct(string $login, string $password)
    {

	}

	public function execute()
    {
		throw new \Exception("Not implemented");
	}
}
