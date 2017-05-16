<?php

namespace WebEvents\Actions;
require_once __DIR__ . "/../autoloader.php";

use PHPUnit\Framework\TestCase;

use WebEvents\Database\DAOUser;
use WebEvents\Configuration;
use WebEvents\Database\MyDatabase;

final class ActionGetUserTest extends TestCase
{
    private $database;
    private $daoUser;

    protected function setUp()
    {
        $this->database = MyDatabase::fromConfiguration(new Configuration("webevents_test.ini"));
        $this->database->query(file_get_contents(__DIR__ . "/../../scripts/sql/drop_tables.sql"));
        $this->database->query(file_get_contents(__DIR__ . "/../../scripts/sql/create_tables.sql"));
        $this->database->query(file_get_contents(__DIR__ . "/../../scripts/sql/generate_data.sql"));

        $this->daoUser = new DAOUser($this->database);

        // Ajout d'un utilisateur
        $signup = new ActionSignUp($this->daoUser,
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

        $signin = new ActionSignIn($this->daoUser,"thelegend12", "password");
        $responseSignIn = $signin->execute();
    }

    public function testAll()
    {
        $getuser = new ActionGetUser($this->daoUser);
        $response = $getuser->execute();
        $array = $response->getArray();
        $this->assertEquals(true, $array['success']);
        $this->assertEquals("thelegend12", $array['username']);
        $this->assertEquals("John", $array['firstname']);
        $this->assertEquals("Smith", $array['lastname']);
        $this->assertEquals(1, $array['civility']);
        $this->assertEquals("0123456789", $array['cellphone']);
        // TODO birthday
        // TODO adress
        $this->assertEquals(true, $array['active']);
    }
}
