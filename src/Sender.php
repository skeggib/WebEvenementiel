<?php

namespace WebEvents;

/**
 * Sends a Response to the front-end using HTTP protocol.
 */
class Sender
{
    public function __construct()
    {

    }

    /**
     * Sends a response to the front-end.
     * @param Response $response
     */
    public function send(Response $response)
    {
        echo $response->getJSON();
    }

    public function sendError($httpStatusCode) {
        http_response_code($httpStatusCode);
        exit();
    }
}
