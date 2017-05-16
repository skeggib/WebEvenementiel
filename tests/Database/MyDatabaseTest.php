<?php

namespace WebEvents\Database;
require_once __DIR__ . "/../autoloader.php";

use PHPUnit\Framework\TestCase;

use WebEvents\Configuration;
use WebEvents\Database\MyDatabase;

include_once(__DIR__ . '/../../src/Database/MyDatabase.php');

final class MyDatabaseTest extends TestCase {
	
    public function testConnect()
    {
        try
        {
            $config = new  Configuration("webevents_test.ini");
            $db = new MyDatabase(
                $config->getDatabaseHost(),
                $config->getDatabaseName(),
                $config->getDatabaseLogin(),
                $config->getDatabasePasswd());
            $db->query("SELECT * FROM utilisateur");
        }

        catch (\Exception $e)
        {
            $this->fail("");
        }
    }
}
