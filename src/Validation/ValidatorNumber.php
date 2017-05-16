<?php

namespace WebEvents\Validation;

/**
 * Validates a Date
 */
class ValidatorNumber extends Validator
{
    public function __construct()
    {
    }

    public function validate($nb)
    {
        if(preg_match("#^[0-9]+$#", $nb))
        {
            return true;
        }
        return false;
    }
}