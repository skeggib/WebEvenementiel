<?php

namespace WebEvents\Validation;

require_once(__DIR__ . "/Validator.php");

/**
 * Validates an email
 */
class ValidatorName extends Validator
{
    public function __construct()
    {
    }

    public function validate($name)
    {
        if(strlen($name) >= 2 && preg_match("#^[a-zA-Z0-9 -]+$#", $name))
            return true;
        return false;
    }
}
