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
                'id'=>$event->getId(),
                'name'=>$event->getName(),
                'beginDate'=>$event->getBeginDate(),
                'endDate'=>$event->getEndDate(),
                'beginTime'=>$event->getBeginTime(),
                'endTime'=>$event->getEndTime(),
                'active'=>$event->getActive(),
                'description'=>$event->getDescription(),
                'addressId'=>$event->getAddress()->getId(),
                'organizerId'=>$event->getOrganizer()->getId()
            )
        );
    }
}