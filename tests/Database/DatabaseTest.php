<?php

namespace WebEvents\Database;

use PHPUnit\Framework\TestCase;

include_once(__DIR__ . '/../../src/Database/MyDatabase.php');

final class DatabaseTest extends TestCase {
	
    public function testConnect()
    {
    	//$db = new Database('localhost', 'webevenementiel', 'password', 'webevenementiel');
    	// TODO: test connect and close
    }
}
