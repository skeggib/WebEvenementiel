<?php

namespace WebEvents\Validation;

/**
 * Validates a Date
 */
class ValidatorDate extends Validator
{
    public function __construct()
    {
    }

    public function validate($date)
    {
        if(preg_match("#^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$#", $date))
        {
            $day = $date[0].$date[1];
            $month = $date[3].$date[4];
            $year = $date[6].$date[7].$date[8].$date[9];

            if($day >= 0 && $day <= 31
                && $month >= 0 && $day <= 12
                && $year >= 0)
            {
                return true;
            }
        }
        return false;
    }
}