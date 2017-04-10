<?php

namespace WebEvents\Validation;

abstract class Validator
{
    /**
     * Checks and validates data
     *
     * @return  Boolean True if the data is correct
     */
     public abstract function validate($data);
}
