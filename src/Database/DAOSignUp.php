<?php

namespace WebEvents\Database;

require_once __DIR__ . "/IDAOSignUp.php";

class DAOSignUp implements IDAOSignUp
{
    private $database;

    public function __construct(IDatabase $database)
    {
        $this->database = $database;
    }

    public function signup($username,
                           $email,
                           $password,
                           $firstname,
                           $lastname,
                           $civility,
                           $birthday,
                           $cellphone,
                           $adressId,
                           $actif)
    {
        try
        {
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
                "'" . $username . "', " .
                "'" . $email . "', " .
                "'" . $this->database->hash($password) . "', " .
                "'" . $firstname . "', " .
                "'" . $lastname . "', " .
                $civility . ", " .
                "'" . $cellphone . "', " .
                $adressId . ", " .
                "true);");

            return true;
        }

        catch (\Exception $e)
        {
            return false;
        }
    }
}