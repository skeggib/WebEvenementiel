<?php

namespace WebEvents\Actions;

use WebEvents\Database\IDAOEvent;
use WebEvents\Responses\Response;
use WebEvents\Responses\ResponseEvent;

class ActionGetEvent extends Action
{
	private $dao;
	private $id;

    public function __construct(IDAOEvent $dao, $id) {
    	$this->dao = $dao;
    	$this->id = $id;
	}

	public function execute() {
		$event = $this->dao->get($this->id);

		if (!$event)
			return new Response(array(), true);

        return new ResponseEvent($event);
	}
}
