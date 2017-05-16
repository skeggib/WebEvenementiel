<?php

namespace WebEvents\Actions;
require_once __DIR__ . "/../autoloader.php";

use PHPUnit\Framework\TestCase;

use WebEvents\Database\DAOSignIn;
use WebEvents\Database\DAOSignUp;
use WebEvents\Configuration;
use WebEvents\Database\MyDatabase;
use Webmozart\Assert\Assert;

final class ActionGetUserTest extends TestCase
{
    private $database;

    protected function setUp()
    {
        $this->database = MyDatabase::fromConfiguration(new Configuration("webevents_test.ini"));
        $this->database->query(file_get_contents(__DIR__ . "/../../scripts/sql/drop_tables.sql"));
        $this->database->query(file_get_contents(__DIR__ . "/../../scripts/sql/create_tables.sql"));
        $this->database->query(file_get_contents(__DIR__ . "/../../scripts/sql/generate_data.sql"));
    }

    public function testAll()
    {
        $daoSignIn = new DAOSignIn($this->database);
        $daoSignUp = new DAOSignUp($this->database);

        // Aucun utilisateur n'est connecte
        $getuser = new ActionGetUser($daoSignIn);
        $response = $getuser->execute();
        $array = $response->getArray();
        $this->assertEquals(false, $array['success'], "No user should be connected");

        // Ajout d'un utilisateur
        $signup = new ActionSignUp($daoSignUp,
            "thelegend12",
            "thelegend12@gmail.com",
            "password",
            "John",
            "Smith",
            1,
            new \DateTime('2011-01-01T15:03:01.012345Z'),
            "0123456789",
            1,
            true
            );
        $responseSignUp = $signup->execute();
        Assert::true($responseSignUp->getArray()['success'], "The user was not added");

        $signin = new ActionSignIn($daoSignIn,"thelegend12", "password");
        $responseSignIn = $signin->execute();
        Assert::true($responseSignIn->getArray()['success'], "Cannot sign in with the user 'thelegend12'");
        
        $getuser = new ActionGetUser($daoSignIn);
        $response = $getuser->execute();
        $array = $response->getArray();
        $this->assertEquals(true, $array['success']);
        $this->assertEquals("thelegend12", $array['username']);
        $this->assertEquals("John", $array['firstname']);
        $this->assertEquals("Smith", $array['lastname']);
    }
}
