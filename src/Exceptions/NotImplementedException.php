<?php

namespace WebEvents\Exceptions;

class NotImplementedException extends \Exception {

	public function __construct($message = null)
	{
		parent::__construct($message);
	}

}