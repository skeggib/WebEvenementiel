<?php

namespace WebEvents\Validation;

/**
 * Validates a password
 */
class ValidatorPassword extends Validator
{
    public function __construct()
    {
    }

    public function validate($password) // TODO
    {
        if(strlen($password) > 0)
            return true;
        return false;
    }
}
