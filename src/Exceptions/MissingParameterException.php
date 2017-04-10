<?php

class MissingParameterException extends Exception {

	private $parameterName;

	public function __construct($parameterName, $message = "")
	{
		parent::__construct($message);
		$this->parameterName = $parameterName;
	}

	public function getParameterName()
	{
		return $this->parameterName;
	}

}