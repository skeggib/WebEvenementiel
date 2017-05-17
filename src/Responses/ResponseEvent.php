<?php

namespace WebEvents\Responses;

use WebEvents\Models\Event;
use WebEvents\Responses\Response;

class ResponseEvent extends Response
{
    public function __construct(Event $event)
    {
        parent::__construct(
            array(
                'event' => $event
            )
        );
    }
}