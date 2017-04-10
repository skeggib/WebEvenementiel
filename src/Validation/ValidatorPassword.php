<?php

namespace WebEvents\Validation;

require_once(__DIR__ . "/Validator.php");

/**
 * Validates an email
 */
class ValidatorPassword extends Validator
{
    public function __construct()
    {
    }

    public function validate($password)
    {
        if(strlen($password) > 0)
            return true;
        return false;
    }
}
