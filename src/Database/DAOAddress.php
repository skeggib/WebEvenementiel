<?php
/**
 * Created by PhpStorm.
 * User: SK250623
 * Date: 16/05/2017
 * Time: 15:54
 */

namespace WebEvents\Database;

use WebEvents\Models\Address;

class DAOAddress implements IDAOAddress
{
    private $database;

    public function __construct(IDatabase $database)
    {
        $this->database = $database;
    }

    public function add(Address $address)
    {
        // TODO Validate date

        $this->database->query(
            "INSERT INTO lieu(" .
            "num_rue_lieu, " .
            "nom_rue_lieu, " .
            "nom_ville_lieu, " .
            "cp_lieu) " .
            "VALUES(" .
            "'" . $address->getNum() . "', " .
            "'" . $address->getRue() . "', " .
            "'" . $address->getVille() . "', " .
            $address->getCp() . ");"
        );

        $address->setId($this->database->insertId());

        return $address;
    }
}