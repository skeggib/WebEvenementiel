<?php

namespace WebEvents\Actions;

require_once(__DIR__ . "/Action.php");
require_once(__DIR__ . "/../Exceptions/NotImplementedException.php");

require_once(__DIR__ . "/../Database/IDAOEvent.php");
use WebEvents\Database\IDAOEvent;

require_once(__DIR__ . "/../Response.php");
use WebEvents\Response;
require_once(__DIR__ . "/../Responses/EventResponse.php");
use WebEvents\Responses\EventResponse;

class ActionGetEvent extends Action
{
	private $dao;
	private $id;

    public function __construct(IDAOEvent $dao, $id) {
    	$this->dao = $dao;
    	$this->id = $id;
	}

	public function execute() {
		$data = $this->dao->getEvent($this->id);
		if ($data == false)
			return new Response(array(), true); // TODO:skeggib Error code
		return new EventResponse($event);
	}
}
