<?php

namespace WebEvents\Validation;

/**
 * Validates a Date
 */
class ValidatorCityCode extends Validator
{
    public function __construct()
    {
    }

    public function validate($data)
    {
        if(!preg_match("#^[0-9]{5}$#", $data))
            return false;

        return true;
    }
}