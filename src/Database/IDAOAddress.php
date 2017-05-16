<?php

namespace WebEvents\Database;

use WebEvents\Models\Address;

interface IDAOAddress
{
    /**
     * Adds an address to the database
     * @param Address $address Address to add
     * @returns Address The address with the ID updated
     */
    public function add(Address $address);
}