<?php

namespace WebEvents\Actions;

use WebEvents\Response;
use WebEvents\Database\IDAOUser;

/**
 * Action which gets an User
 */
class ActionGetUser extends Action
{
    private $dao;

	public function __construct(IDAOUser $dao)
	{
        $this->dao = $dao;
	}

	public function execute() {
		$user = $this->dao->getConnected();

		if (!$user)
            return new Response(array(), true);

		$array = array(
		    'id' => $user->getId(),
		    'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'firstname' => $user->getFirstName(),
            'lastname' => $user->getLastName(),
            'active' => $user->getActive(),
            'civility' => $user->getCivility(),
            'cellphone' => $user->getCellphone()
        );

		return new Response($array, false);
	}
}
