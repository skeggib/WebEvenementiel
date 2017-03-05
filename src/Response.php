<?php

namespace WebEvent;

/**
 * A Response contain the result of an action and is ready to send
 */
class Response
{
    private $value;

    /**
     * Response constructor
     *
     * @param       string  $value  Value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __destruct()
    {
    }

    /**
     * getString return the value of the Response
     */
    public function getString()
    {
        return $this->value;
    }
}
