<?php

namespace WebEvents;

use PHPUnit\Framework\TestCase;

include_once('src/QueryParser.php');

include_once('src/Actions/ActionSignIn.php');
use WebEvents\Actions\ActionSignIn;

final class QueryParserSignInTest extends TestCase {
    
	/**
	 * @expectedException InvalidArgumentException
	 */
    public function testFailCmdNotSet() {
    	$post = [];
    	$post['login'] = 'thelegend27';
    	$post['password'] = 'supersecurepassword';
    	$qp = new QueryParser($post);
    }

	/**
	 * @expectedException InvalidArgumentException
	 */
    public function testFailLoginNotSet() {
    	$post = [];
    	$post['cmd'] = 'signin';
    	$post['password'] = 'supersecurepassword';
    	$qp = new QueryParser($post);
    }

	/**
	 * @expectedException InvalidArgumentException
	 */
    public function testFailPasswordNotSet() {
    	$post = [];
    	$post['cmd'] = 'signin';
    	$post['login'] = 'thelegend27';
    	$qp = new QueryParser($post);
    }

    public function testConstructor() {

    	$post = [];
    	$post['cmd'] = 'signin';
    	$post['login'] = 'thelegend27';
    	$post['password'] = 'supersecurepassword';
    	$qp = new QueryParser($post);

    	$this->assertTrue(is_a($qp->getAction(), ActionSignIn::class));
    }
}
