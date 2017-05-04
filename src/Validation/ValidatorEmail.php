<?php

namespace WebEvents\Validation;

/**
 * Validates an email
 */
class ValidatorEmail extends Validator
{
    public function __construct()
    {
    }

    public function validate($email)
    {
        if(preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\\.[a-zA-Z]+$#", $email))
            return true;
        return false;
    }
}
