<?php

namespace WebEvents\Validation;

/**
 * Validates a name
 */
class ValidatorName extends Validator
{
    public function __construct()
    {
    }

    public function validate($name)
    {
        if(strlen($name) >= 2 && preg_match("#^[a-zA-Z0-9àáâãäåçèéêëìíîïðòóôõöùúûüýÿ -]+$#", $name))
            return true;
        return false;
    }
}
