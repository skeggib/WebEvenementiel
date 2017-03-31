<?php

namespace WebEvents\Models;

use PHPUnit\Framework\TestCase;

include_once(__DIR__ . '/../../src/Models/Address.php');

final class AddressTest extends TestCase {
	
    public function testConstructor()
    {
    	$address = new Address(2, 16, "rue des navets", "nanarland", "12345");

    	$this->assertEquals(2, $address->getId());
    	$this->assertEquals(16, $address->getNum());
    	$this->assertEquals("rue des navets", $address->getRue());
    	$this->assertEquals("nanarland", $address->getVille());
    	$this->assertEquals(12345, $address->getCp());
    }
}