<?php

namespace WebEvents;
require_once __DIR__ . "/autoloader.php";

use PHPUnit\Framework\TestCase;

use WebEvents\Response;

final class ResponseTest extends TestCase {

	public function testEncodeWithError() {
		$array = array(
			'foo' => 'bar',
			'bar' => 'foo'
		);

		$response = new Response($array, true, "Message");
		$decode = json_decode($response->getJSON());

		$this->assertEquals(false, $decode->success);
	}
}