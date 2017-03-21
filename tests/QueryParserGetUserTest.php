<?php

namespace WebEvents;

use PHPUnit\Framework\TestCase;

include_once('src/QueryParser.php');

include_once('src/Actions/ActionGetUser.php');
use WebEvents\Actions\ActionGetUser;

final class QueryParserGetUserTest extends TestCase {
    
	/**
	 * @expectedException InvalidArgumentException
	 */
    public function testFailCmdNotSet() {
    	$post = [];
    	$qp = new QueryParser($post);
    }

    public function testConstructor() {

    	$post = [];
    	$post['cmd'] = 'getuser';
    	$qp = new QueryParser($post);

    	$this->assertTrue(is_a($qp->getAction(), ActionGetUser::class));
    }
}
