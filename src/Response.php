<?php

namespace WebEvents;

/**
 * A Response contain the result of an action and is ready to send
 */
class Response
{
    private $error;
    private $errorMessage;
    private $array;

    /**
     * @param       string  $array  Associative array containing the response, the keys 'success' and 'errorMessage' are reserved
     * @param       bool    $error  Set to true if there was an error during the process
     * @param       int  $errorMessage  Error code, will be sent only if $error is true
     */
    public function __construct($array, $error, $errorCode = -1)
    {
        $this->array = $array;
    }

    public function __destruct()
    {
    }

    /**
     * getString return the value of the Response
     */
    public function getJSON()
    {
        $resp = $this->array;
        $resp['success'] = !$this->error;
        if ($this->error)
            $resp['errorMessage'] = $errorMessage;

        return json_encode($resp, JSON_FORCE_OBJECT);
    }
}
