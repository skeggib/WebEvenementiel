<?php

namespace WebEvents\Actions;

require_once(__DIR__ . "/Action.php");
require_once(__DIR__ . "/../Exceptions/NotImplementedException.php");

require_once(__DIR__ . "/../Models/Event.php");
use WebEvents\Models\Event;
require_once(__DIR__ . "/../Database/IDAOEvent.php");
use WebEvents\Database\IDAOEvent;

require_once(__DIR__ . "/../Response.php");
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
