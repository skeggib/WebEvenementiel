<?php

namespace WebEvent;

/**
 * Sender send a result to the front-end
 */

class Sender
{
    public function __construct()
    {
    }

    /**
     * send a response to the front-end
     *
     * @param       Response $response   The response to send
     */
    public function send($response)
    {
        echo $response->getString();
    }

    /**
     * Error
     *
     * @param   string $message     The error message
     */
    public function error($message)
    {
    
    }
}
