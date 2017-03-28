<?php

namespace WebEvent\Database;

interface IDAOGetEvent
{
    /**
     * Get an event 
     *
     * @param       int     $eventId    The event id
     * @param       int     $userId     The user id
     *
     * @return      Event   
     */
     public function getEvent(  int $eventId,
                                int $userId);
}
