<?php

namespace WebEvents\Reponses;

use WebEvents\Response;

class EventsListResponse extends Response
{
	public function __construct($array)
	{
		parent::__construct($array, false);
	}
}