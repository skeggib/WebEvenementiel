<?php

namespace WebEvents\Models;
require_once __DIR__ . "/../autoloader.php";

use PHPUnit\Framework\TestCase;

use WebEvents\Models\Adress;

final class AddressTest extends TestCase {
	
    public function testConstructor()
    {
    	$address = new Address(2, 16, "rue des navets", "nanarland", "12345");

    	$this->assertEquals(2, $address->getId());
    	$this->assertEquals(16, $address->getStreetNumber());
    	$this->assertEquals("rue des navets", $address->getStreetName());
    	$this->assertEquals("nanarland", $address->getCityName());
    	$this->assertEquals(12345, $address->getCityCode());
    }
}