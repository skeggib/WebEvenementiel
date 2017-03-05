<?php

namespace WebEvents\Actions;

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
