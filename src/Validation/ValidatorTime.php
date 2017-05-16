<?php

namespace WebEvents\Validation;

/**
 * Validates a Date
 */
class ValidatorTime extends Validator
{
    public function __construct()
    {
    }

    public function validate($time)
    {
        if(preg_match("#^[0-9]{2}\:[0-9]{2}$#", $time))
        {
            $hour = $time[0].$time[1];
            $min = $time[3].$time[4];
            if($hour >= 0 && $hour < 24
                && $min >= 0 && $min < 60)
            {
                return true;
            }
            
        }
        return false;
    }
}