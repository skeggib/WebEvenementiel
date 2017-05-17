<?php

namespace WebEvents\Actions;

use WebEvents\Responses\Response;
use WebEvents\Responses\ResponseUser;
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

		return new ResponseUser($user);
	}
}
