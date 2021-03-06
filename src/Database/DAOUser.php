<?php

namespace WebEvents\Database;

use WebEvents\Models\User;

class DAOUser implements IDAOUser
{
    private $database;
    private $daoAddress;

    public function __construct(IDatabase $database, IDAOAddress $daoAddress)
    {
        $this->database = $database;
        $this->daoAddress = $daoAddress;
    }

    public function check($login, $password)
    {
        $results = $this->database->query(
            "SELECT pseudo_utilisateur " .
            "FROM utilisateur WHERE " .
            "pseudo_utilisateur = '" . $login . "'" .
            " AND mdp_utilisateur = '" . $this->database->hash($password) . "';");

        return $results->rowCount() > 0;
    }

    public function getConnected()
    {
        if (!isset($_SESSION['login']))
            return false;

        $results = $this->database->query(
            "SELECT * FROM utilisateur " .
            "WHERE pseudo_utilisateur = '" . $_SESSION['login'] . "';"
        );

        if ($results->rowCount() < 1)
            return false;

        $row = $results->fetch();

        $address = $this->daoAddress->get($row['id_lieu']);
        if (!$address)
            return false;

        $user = new User(
            $row['id_utilisateur'],
            $row['pseudo_utilisateur'],
            $row['email_utilisateur'],
            $row['prenom_utilisateur'],
            $row['nom_utilisateur'],
            $row['actif_utilisateur'],
            null,
            $row['civilite_utilisateur'],
            null, // TODO:skeggib
            $row['mobile_utilisateur'],
            $address
        );

        return $user;
    }

    public function get($id)
    {
        if (!isset($id))
            return false;
        if (!is_numeric($id))
            return false;

        $results = $this->database->query(
            "SELECT * FROM utilisateur " .
            "WHERE id_utilisateur = " . $id . ";"
        );

        if ($results->rowCount() < 1)
            return false;

        $row = $results->fetch();

        $address = $this->daoAddress->get($row['id_lieu']);
        if (!$address)
            return false;

        $user = new User(
            $row['id_utilisateur'],
            $row['pseudo_utilisateur'],
            $row['email_utilisateur'],
            $row['prenom_utilisateur'],
            $row['nom_utilisateur'],
            $row['actif_utilisateur'],
            null,
            $row['civilite_utilisateur'],
            null, // TODO:skeggib
            $row['mobile_utilisateur'],
            $address
        );

        return $user;
    }

    public function add(User $user)
    {
        $activeStr = "";
        if ($user->getActive())
            $activeStr = "TRUE";
        else
            $activeStr = "FALSE";

        $this->database->query(
            "INSERT INTO utilisateur(" .
            "pseudo_utilisateur, " .
            "email_utilisateur, " .
            "mdp_utilisateur, " .
            "prenom_utilisateur, " .
            "nom_utilisateur, " .
            "civilite_utilisateur, " .
            "mobile_utilisateur, " .
            "id_lieu, " .
            "actif_utilisateur) " .
            "VALUES(" .
            "'" . $user->getUsername() . "', " .
            "'" . $user->getEmail() . "', " .
            "'" . $this->database->hash($user->getPassword()) . "', " .
            "'" . $user->getFirstName() . "', " .
            "'" . $user->getLastName() . "', " .
            $user->getCivility() . ", " .
            "'" . $user->getCellphone() . "', " .
            $user->getAddress()->getId() . ", " .
            $activeStr . ");");

        $user->setId($this->database->insertId());

        return $user;
    }

    public function exists($login) {
        $result = $this->database->query("SELECT pseudo_utilisateur FROM utilisateur WHERE pseudo_utilisateur = '" . $login . "'");
        return $result->rowCount() > 0;
    }
}