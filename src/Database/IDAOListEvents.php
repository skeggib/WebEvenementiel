<?php

namespace WebEvent\Database;

interface IDAOListEvents
{
    /**
     * Get all events of an user
     *
     * @param   int     $id     The user's Id
     *
     * @return  array   contain events
     */
     public function getListEvents(int $id);
}
