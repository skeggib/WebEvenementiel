<?php

namespace WebEvents;

require_once("Response.php");

/**
 * Allow to send a response to the front-end
 */
class Sender
{
    public function __construct()
    {
    }

    /**
     * Sends a response to the front-end
     *
     * @param       Response $response   The response to send
     */
    public function send(Response $response)
    {
        echo $response->getJSON();
    }
}
