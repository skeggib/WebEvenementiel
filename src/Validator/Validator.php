<?php

namespace WebEvents\Validation;

/**
 * 
 */

abstract class Validator
{
    /**
     * Check and validate a data
     *
     * @return  Boolean True if the data is correct
     */
     public abstract function validate();
}
