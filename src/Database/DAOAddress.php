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
            "'" . $address->getStreetNumber() . "', " .
            "'" . $address->getStreetName() . "', " .
            "'" . $address->getCityName() . "', " .
            $address->getCityCode() . ");"
        );

        $address->setId($this->database->insertId());

        return $address;
    }

    public function get($id)
    {
        if (!isset($id))
            return false;
        if (!is_numeric($id))
            return false;

        $results = $this->database->query("SELECT * FROM lieu WHERE id_lieu = " . $id);

        if ($results->rowCount() < 1)
            return false;

        $row = $results->fetch();

        $address = new Address(
            $row['id_lieu'],
            $row['num_rue_lieu'],
            $row['nom_rue_lieu'],
            $row['nom_ville_lieu'],
            $row['cp_lieu']
        );

        return $address;
    }
}