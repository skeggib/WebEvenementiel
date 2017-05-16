<?php

namespace WebEvents\Validation;

/**
 * Validates a Date
 */
class ValidatorCP extends Validator
{
    public function __construct()
    {
    }

    public function validate($cp)
    {
        if(preg_match("#^[0-9]{5}$#", $cp))
        {
            return true;
        }
        return false;
    }
}