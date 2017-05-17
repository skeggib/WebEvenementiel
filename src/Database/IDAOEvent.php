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
    public function get($eventId);

    /**
     * Get all events of an user
     *
     * @param       int     $userId     The user's Id
     *      
     * @return      array           contain events
     * @return      bool    false   if any event found
     */
    public function getListEvents($userId);

    /**
     * Adds an event to the database
     *
     * @param       Event   $event  The event to add
     * @return      Event   The event with the ID updated
     */
    public function add(Event $event);
}
