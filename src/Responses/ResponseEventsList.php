<?php

namespace WebEvents\Reponses;

use WebEvents\Responses\Response;

class ResponseEventsList extends Response
{
	public function __construct($array)
	{
		parent::__construct($array, false);
	}
}