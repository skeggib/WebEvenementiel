<?php

namespace WebEvents\Reponses;

use WebEvents\Response;

class EventsListReponse extends Response
{
	public function __construct($array)
	{
		parent::__construct($array, false);
	}
}