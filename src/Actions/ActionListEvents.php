<?php

namespace WebEvents\Actions;

use WebEvents\Database\IDAOEvent;
use WebEvents\Database\IDAOUser;
use WebEvents\Responses\Response;
use WebEvents\Reponses\ResponseEventsList;

class ActionListEvents extends Action
{
    private $daoEvent;
	private $daoUser;

	public function __construct(IDAOEvent $daoEvent, IDAOUser $daoUser)
	{
		$this->daoUser = $daoEvent;
		$this->daoUser = $daoUser;
	}

	public function execute()
	{
	    $user = $this->daoUser->getConnected();

	    if (!$user)
	        return new Response(array(), true, NOT_CONNECTED);

		$list = $this->daoUser->getListEvents($user->getId());

		if (!$list)
			return new Response(aray(), true);

        return new ResponseEventsList($list);
	}
}
