<?php

namespace WebEvents\Actions;

use WebEvents\Database\IDAOEvent;
use WebEvents\Response;
use WebEvents\Responses\EventsListReponse;

/**
 * Action which invite some people to an Event
 */

class ActionListEvents extends Action
{
	private $dao;
	private $userId;

	public function __construct(IDAOEvent $dao, $userId)
	{
		$this->dao = $dao;
		$this->userId = $userId;
	}

	public function execute()
	{
		$data = $this->dao->getListEvents($this->userId);
		if ($data == false)
			return new Response(aray(), true); // TODO:skeggib Error code
		return new EventsListReponse($data);
	}
}
