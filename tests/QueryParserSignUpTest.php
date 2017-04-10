<?php

namespace WebEvents;

use PHPUnit\Framework\TestCase;

require_once('src/QueryParser.php');

require_once('src/Database/DAOFactory.php');
use WebEvents\Database\DAOFactory;
require_once('src/Actions/ActionSignUp.php');
use WebEvents\Actions\ActionSignUp;
require_once __DIR__ . "/../src/Database/MyDatabase.php";
use WebEvents\Database\MyDatabase;

final class QueryParserSignUpTest extends TestCase {
    
	/**
	 * @expectedException InvalidArgumentException
	 */
    public function testFailCmdNotSet() {
    	$post = [];
        $post['login'] = 'thelegend27';
        $post['password'] = 'supersecurepassword';
        $post['firstname'] = 'Jack';
        $post['lastname'] = 'Daniels';
        $post['email'] = 'thelegend27@gmail.com';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));
    	$qp = new QueryParser($post, new DAOFactory($database));
    }

	/**
	 * @expectedException InvalidArgumentException
	 */
    public function testFailLoginNotSet() {
    	$post = [];
        $post['cmd'] = 'signup';
        $post['password'] = 'supersecurepassword';
        $post['firstname'] = 'Jack';
        $post['lastname'] = 'Daniels';
        $post['email'] = 'thelegend27@gmail.com';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));
    	$qp = new QueryParser($post, new DAOFactory($database));
    }

	/**
	 * @expectedException InvalidArgumentException
	 */
    public function testFailPasswordNotSet() {
    	$post = [];
        $post['cmd'] = 'signup';
        $post['login'] = 'thelegend27';
        $post['firstname'] = 'Jack';
        $post['lastname'] = 'Daniels';
        $post['email'] = 'thelegend27@gmail.com';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));
    	$qp = new QueryParser($post, new DAOFactory($database));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testFailFirstNameNotSet() {
        $post = [];
        $post['cmd'] = 'signup';
        $post['login'] = 'thelegend27';
        $post['password'] = 'supersecurepassword';
        $post['lastname'] = 'Daniels';
        $post['email'] = 'thelegend27@gmail.com';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));
        $qp = new QueryParser($post, new DAOFactory($database));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testFailLastNameNotSet() {
        $post = [];
        $post['cmd'] = 'signup';
        $post['login'] = 'thelegend27';
        $post['password'] = 'supersecurepassword';
        $post['firstname'] = 'Jack';
        $post['email'] = 'thelegend27@gmail.com';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));
        $qp = new QueryParser($post, new DAOFactory($database));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testFailEmailNotSet() {
        $post = [];
        $post['cmd'] = 'signup';
        $post['login'] = 'thelegend27';
        $post['password'] = 'supersecurepassword';
        $post['firstname'] = 'Jack';
        $post['lastname'] = 'Daniels';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));
        $qp = new QueryParser($post, new DAOFactory($database));
    }

    public function testConstructor() {

    	$post = [];
    	$post['cmd'] = 'signup';
    	$post['login'] = 'thelegend27';
        $post['email'] = 'thelegend27@gmail.com';
    	$post['password'] = 'supersecurepassword';
        $post['firstname'] = 'Jack';
        $post['lastname'] = 'Daniels';
        $post['civility'] = 'M.';
        $post['birthday'] = '';
        $post['cellphone'] = '0123457896';
        $post['cp'] = '96458';
        $post['town'] = 'Ville';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));
    	$qp = new QueryParser($post, new DAOFactory($database));

    	$this->assertTrue(is_a($qp->getAction(), ActionSignUp::class));
    }
}
