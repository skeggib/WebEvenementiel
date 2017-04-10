<?php

namespace WebEvents\Reponses;

require_once(__DIR__ . "/../Response.php");
use WebEvents\Response;

class EventsListReponse extends Response
{
	public function __construct($array)
	{
		parent::__construct($array, false);
	}
}