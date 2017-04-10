<?php

namespace WebEvents;

use PHPUnit\Framework\TestCase;

require_once('src/QueryParser.php');

require_once('src/Database/DAOFactory.php');
use WebEvents\Database\DAOFactory;
require_once('src/Actions/ActionSignIn.php');
use WebEvents\Actions\ActionSignIn;
require_once __DIR__ . "/../src/Database/MyDatabase.php";
use WebEvents\Database\MyDatabase;

final class QueryParserSignInTest extends TestCase {
    
	/**
	 * @expectedException InvalidArgumentException
	 */
    public function testFailCmdNotSet() {
    	$post = [];
    	$post['login'] = 'thelegend27';
    	$post['password'] = 'supersecurepassword';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));
    	$qp = new QueryParser($post, new DAOFactory($database));
    }

	/**
	 * @expectedException InvalidArgumentException
	 */
    public function testFailLoginNotSet() {
    	$post = [];
    	$post['cmd'] = 'signin';
    	$post['password'] = 'supersecurepassword';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));
    	$qp = new QueryParser($post, new DAOFactory($database));
    }

	/**
	 * @expectedException InvalidArgumentException
	 */
    public function testFailPasswordNotSet() {
    	$post = [];
    	$post['cmd'] = 'signin';
    	$post['login'] = 'thelegend27';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));
    	$qp = new QueryParser($post, new DAOFactory($database));
    }

    public function testConstructor() {

    	$post = [];
    	$post['cmd'] = 'signin';
    	$post['login'] = 'thelegend27';
    	$post['password'] = 'supersecurepassword';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));
    	$qp = new QueryParser($post, new DAOFactory($database));

    	$this->assertTrue(is_a($qp->getAction(), ActionSignIn::class));
    }
}
