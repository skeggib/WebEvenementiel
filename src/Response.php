<?php

namespace WebEvents;

/**
 * A Response contains the result of an action and is ready to be sent
 */
class Response
{
    private $array;
    private $error;
    private $errorCode;

    /**
     * @param       string  $array  Associative array containing the response, the keys 'success' and 'errorCode' are reserved
     * @param       bool    $error  Set to true if there was an error during the process
     * @param       int  $errorCode Error code, will be sent only if $error is true
     */
    public function __construct($array, $error, $errorCode = -1)
    {
        $this->array = $array;
        $this->error = $error;
        $this->errorCode = $errorCode;
    }

    public function getArray() {
        $resp = $this->array;
        $resp['success'] = !$this->error;
        if ($this->error)
            $resp['errorCode'] = $this->errorCode;
        return $resp;
    }

    /**
     * @brief Generates a JSON string containing the response
     * @return The JSON string
     */
    public function getJSON()
    {
        return json_encode($this->getArray(), JSON_FORCE_OBJECT);
    }
}
