<?php

namespace WebEvents;

/**
 * Contains the result of an action (in an associative array) and formats it to JSON.
 */
class Response
{
    private $array;
    private $error;
    private $errorCode;

    /**
     * Response constructor.
     * @param $array List of variables to be sent.
     * @param $error Set to true if there was an error.
     * @param int $errorCode Error code if there was an error.
     */
    public function __construct($array = array(), $error = false, $errorCode = -1)
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
     * Formats the response to JSON.
     * @return string The response formatted to JSON.
     */
    public function getJSON()
    {
        return json_encode($this->getArray(), JSON_FORCE_OBJECT);
    }
}
