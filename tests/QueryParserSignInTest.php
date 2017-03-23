<?php

namespace WebEvents;

use PHPUnit\Framework\TestCase;

require_once('src/QueryParser.php');

require_once('src/Database/DAOFactory.php');
use WebEvents\Database\DAOFactory;
require_once('src/Actions/ActionSignIn.php');
use WebEvents\Actions\ActionSignIn;

final class QueryParserSignInTest extends TestCase {
    
	/**
	 * @expectedException InvalidArgumentException
	 */
    public function testFailCmdNotSet() {
    	$post = [];
    	$post['login'] = 'thelegend27';
    	$post['password'] = 'supersecurepassword';
    	$qp = new QueryParser($post, new DAOFactory());
    }

	/**
	 * @expectedException InvalidArgumentException
	 */
    public function testFailLoginNotSet() {
    	$post = [];
    	$post['cmd'] = 'signin';
    	$post['password'] = 'supersecurepassword';
    	$qp = new QueryParser($post, new DAOFactory());
    }

	/**
	 * @expectedException InvalidArgumentException
	 */
    public function testFailPasswordNotSet() {
    	$post = [];
    	$post['cmd'] = 'signin';
    	$post['login'] = 'thelegend27';
    	$qp = new QueryParser($post, new DAOFactory());
    }

    public function testConstructor() {

    	$post = [];
    	$post['cmd'] = 'signin';
    	$post['login'] = 'thelegend27';
    	$post['password'] = 'supersecurepassword';
    	$qp = new QueryParser($post, new DAOFactory());

    	$this->assertTrue(is_a($qp->getAction(), ActionSignIn::class));
    }
}
