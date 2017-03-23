<?php

namespace WebEvents;

/**
 * A Response contains the result of an action and is ready to be sent
 */
class Response
{
    private $error;
    private $errorMessage;
    private $array;

    /**
     * @param       string  $array  Associative array containing the response, the keys 'success' and 'errorMessage' are reserved
     * @param       bool    $error  Set to true if there was an error during the process
     * @param       int  $errorCode Error code, will be sent only if $error is true
     */
    public function __construct($array, $error, $errorCode = -1)
    {
        $this->array = $array;
    }

    /**
     * @brief Generates a JSON string containing the response
     * @return The JSON string
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
