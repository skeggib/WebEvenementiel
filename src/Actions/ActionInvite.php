<?php

namespace WebEvents\Actions;

require_once(__DIR__ . "/Action.php");
require_once(__DIR__ . "/../Exceptions/NotImplementedException.php");

/**
 * Action which invite someone to an Event
 */
class ActionInvite extends Action
{
	public function __construct()
	{

	}

	public function execute()
	{
		throw new \NotImplementedException();
	}
}
