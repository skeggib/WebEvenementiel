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
        if(preg_match("#^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$#", $date))
        {
            $day = $date[8].$date[9];
            $month = $date[5].$date[6];
            $year = $date[0].$date[1].$date[2].$date[3];

            if($day >= 0 && $day <= 31
                && $month >= 0 && $month <= 12
                && $year >= 0)
            {
                return true;
            }
        }
        return false;
    }
}