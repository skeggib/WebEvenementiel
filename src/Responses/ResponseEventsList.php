<?php

namespace WebEvents\Responses;

use WebEvents\Responses\Response;

class ResponseEventsList extends Response
{
	public function __construct($array)
	{
		parent::__construct(array('eventsList' => $array), false);
	}
}