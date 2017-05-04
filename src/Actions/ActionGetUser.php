<?php

namespace WebEvents\Actions;
require_once __DIR__ . "/../autoloader.php";

use WebEvents\Response;
use WebEvents\Database\IDAOSignIn;

/**
 * Action which gets an User
 */
class ActionGetUser extends Action
{
    private $dao;

	public function __construct(IDAOSignIn $dao)
	{
        $this->dao = $dao;
	}

	public function execute() {
		$user = $this->dao->getUser();

		if (!$user)
            return new Response(array(), true);

		$array = array(
		    'id' => $user->getId(),
		    'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'firstname' => $user->getFirstName(),
            'lastname' => $user->getLastName(),
            'active' => $user->getActive(),
            'civility' => $user->getCivility()
        );

		return new Response($array, false);
	}
}
