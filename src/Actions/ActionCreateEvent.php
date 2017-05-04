<?php

namespace WebEvents\Actions;
require_once __DIR__ . "/../autoloader.php";

use WebEvents\Models\Event;
use WebEvents\Database\IDAOEvent;
use WebEvents\Response;

class ActionCreateEvent extends Action
{
	private $dao;
	private $event;

    public function __construct(IDAOEvent $dao, Event $event)
    {
    	$this->dao = $dao;
    	$this->event = $event;
	}

	public function execute()
	{
		if (!$this->dao->createEvent($this->event))
			return new Response(array(), true); // TODO:skeggib Error code
		else
			return new Response(array(), false);
	}
}
