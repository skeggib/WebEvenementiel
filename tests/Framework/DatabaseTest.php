<?php

/* DatabaseTest.php
 * Sebastien Klasa
 */

namespace WebEvent\Framework;

use PHPUnit\Framework\TestCase;

include_once('src/Framework/Database.php');
use WebEvent\Framework\Database;

final class DatabaseTest extends TestCase
{
    public function testConnect()
    {
    	$db = new Database('localhost', 'webevenementiel', 'password', 'webevenementiel');
    	// TODO: test connect and close
    }
}
