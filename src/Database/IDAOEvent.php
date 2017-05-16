<?php

namespace WebEvents\Database;

use WebEvents\Models\Event;

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
     * Adds an event to the database
     *
     * @param       Event   $event  The event to add
     * @return      Event   The event with the ID updated
     */
    public function add(Event $event);
}
