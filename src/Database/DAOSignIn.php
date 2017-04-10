<?php

namespace WebEvents\Database;

require_once __DIR__ . "/IDAOSignIn.php";
require_once __DIR__ . "/IDatabase.php";

require_once __DIR__ . "/../Models/User.php";
use WebEvents\Models\User;

class DAOSignIn implements IDAOSignIn
{
    private $database;

    public function __construct(IDatabase $database)
    {
        $this->database = $database;
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

    public function getUser()
    {
        if (!isset($_SESSION['login']))
            return false;

        $results = $this->database->query(
            "SELECT * FROM utilisateur JOIN lieu " .
            "ON utilisateur.id_lieu = lieu.id_lieu " .
            "WHERE pseudo_utilisateur = '" . $_SESSION['login'] . "';"
        );

        if ($results->rowCount() < 1)
            return false;

        $row = $results->fetch();

        $user = new User(
            $row['id_utilisateur'],
            $row['pseudo_utilisateur'],
            $row['email_utilisateur'],
            $row['prenom_utilisateur'],
            $row['nom_utilisateur'],
            $row['actif_utilisateur'],
            null, // TODO:skeggib
            $row['civilite_utilisateur'],
            null, // TODO:skeggib
            $row['telephone_utilisateur'],
            $row['cp_lieu'],
            $row['nom_ville_lieu']
        );

        return $user;
    }
}