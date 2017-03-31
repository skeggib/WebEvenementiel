<?php

namespace WebEvents\Actions;

require_once(__DIR__ . "/Action.php");
require_once(__DIR__ . "/../Exceptions/NotImplementedException.php");

require_once(__DIR__ . "/../Database/IDAOEvent.php");
use WebEvents\Database\IDAOEvent;

require_once(__DIR__ . "/../Response.php");
use WebEvents\Response;
require_once(__DIR__ . "/../EventsListReponse.php");
use WebEvents\EventsListReponse;

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
