<?php

namespace WebEvent\Database;

require_once(__DIR__ . "/../Models/Event.php");

interface IDAOEvent
{
    /**
     * Get an event 
     *
     * @param       int     $eventId    The event id
     *
     * @return      Event           if success
     * @return      bool    false   if failed
     */ 
    public function getEvent($eventId);

    /**
     * Get all events of an user
     *
     * @param       int     $id     The user's Id
     *      
     * @return      array           contain events
     * @return      bool    false   if any event found
     */
    public function getListEvents($id);

    /**
     * Create an event
     *
     * @param       Event   $event  The event to create
     *
     * @return      bool    True if the event was created successfully
     */
    public function createEvent(Event $event);
}
