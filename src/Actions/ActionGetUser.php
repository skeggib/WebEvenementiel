<?php

namespace WebEvents\Actions;

require_once(__DIR__ . "/Action.php");
require_once(__DIR__ . "/../Exceptions/NotImplementedException.php");

require_once(__DIR__ . "/../Response.php");
use WebEvents\Response;

/**
 * Action which get an User
 */

class ActionGetUser extends Action
{
	public function __construct()
	{

	}

	public function execute() {
		if (isset($_SESSION['login']))
		{
			$array = array( // TODO:skeggib dao
				"username" => $_SESSION['login'],
				"firstname" => "Noah",
				"lastname" => "Smith"
			);
			return new Response($array, false);
		}

		else
		{
			return new Response(array(), true);
		}
	}
}
