<?php

namespace WebEvents\Actions;
require_once __DIR__ . "/../autoloader.php";

/**
 * Base class for an action
 */
abstract class Action
{
	/**
	 * Execute the action
	 * 
	 * @return     Response The response
	 */
    public abstract function execute();
}
