<?php

namespace WebEvents\Actions;
require_once __DIR__ . "/../autoloader.php";

use WebEvents\Database\IDAOEvent;
use WebEvents\Response;
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
