<?php

namespace WebEvents;

use PHPUnit\Framework\TestCase;

include_once('src/Response.php');

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