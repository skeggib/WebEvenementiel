<?php

namespace WebEvents;
require_once __DIR__ . "/autoloader.php";

use PHPUnit\Framework\TestCase;

use WebEvents\Database\DAOFactory;
use WebEvents\Actions\ActionSignIn;
use WebEvents\Database\MyDatabase;
use WebEvents\Exceptions\InvalidParameterException;

final class QueryParserSignInTest extends TestCase {

    public function testFailCmdNotSet() {
    	$post = [];
    	$post['login'] = 'thelegend27';
    	$post['password'] = 'supersecurepassword';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));

        try {
            $qp = new QueryParser($post, new DAOFactory($database));
            $this->fail("Exception expected but not thrown");
        } catch (\Exception $e) {

        }
    }

    public function testFailLoginNotSet() {
    	$post = [];
    	$post['cmd'] = 'signin';
    	$post['password'] = 'supersecurepassword';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));

        try {
            $qp = new QueryParser($post, new DAOFactory($database));
            $this->fail("Exception expected but not thrown");
        } catch (InvalidParameterException $e) {

        }
    }

    public function testFailPasswordNotSet() {
    	$post = [];
    	$post['cmd'] = 'signin';
    	$post['login'] = 'thelegend27';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));

        try {
            $qp = new QueryParser($post, new DAOFactory($database));
            $this->fail("Exception expected but not thrown");
        } catch (InvalidParameterException $e) {

        }
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
