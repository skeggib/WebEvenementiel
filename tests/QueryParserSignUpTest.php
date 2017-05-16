<?php

namespace WebEvents;
require_once __DIR__ . "/autoloader.php";

use PHPUnit\Framework\TestCase;

use WebEvents\Database\DAOFactory;
use WebEvents\Actions\ActionSignUp;
use WebEvents\Database\MyDatabase;
use WebEvents\Exceptions\InvalidParameterException;

final class QueryParserSignUpTest extends TestCase {

    public function testFailCmdNotSet() {
    	$post = [];
        $post['login'] = 'thelegend27';
        $post['password'] = 'supersecurepassword';
        $post['firstname'] = 'Jack';
        $post['lastname'] = 'Daniels';
        $post['email'] = 'thelegend27@gmail.com';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));

        try {
            $qp = new QueryParser($post, new DAOFactory($database));
            $this->fail("Exception expected but not thrown");
        } catch (\Exception $e) {

        }
    }

    public function testFailLoginNotSet() {
    	$post = [];
        $post['cmd'] = 'signup';
        $post['password'] = 'supersecurepassword';
        $post['firstname'] = 'Jack';
        $post['lastname'] = 'Daniels';
        $post['email'] = 'thelegend27@gmail.com';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));

        try {
            $qp = new QueryParser($post, new DAOFactory($database));
            $this->fail("Exception expected but not thrown");
        } catch (InvalidParameterException $e) {

        }
    }

    public function testFailPasswordNotSet() {
    	$post = [];
        $post['cmd'] = 'signup';
        $post['login'] = 'thelegend27';
        $post['firstname'] = 'Jack';
        $post['lastname'] = 'Daniels';
        $post['email'] = 'thelegend27@gmail.com';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));

        try {
            $qp = new QueryParser($post, new DAOFactory($database));
            $this->fail("Exception expected but not thrown");
        } catch (InvalidParameterException $e) {

        }
    }

    public function testFailFirstNameNotSet() {
        $post = [];
        $post['cmd'] = 'signup';
        $post['login'] = 'thelegend27';
        $post['password'] = 'supersecurepassword';
        $post['lastname'] = 'Daniels';
        $post['email'] = 'thelegend27@gmail.com';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));

        try {
            $qp = new QueryParser($post, new DAOFactory($database));
            $this->fail("Exception expected but not thrown");
        } catch (InvalidParameterException $e) {

        }
    }

    public function testFailLastNameNotSet() {
        $post = [];
        $post['cmd'] = 'signup';
        $post['login'] = 'thelegend27';
        $post['password'] = 'supersecurepassword';
        $post['firstname'] = 'Jack';
        $post['email'] = 'thelegend27@gmail.com';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));

        try {
            $qp = new QueryParser($post, new DAOFactory($database));
            $this->fail("Exception expected but not thrown");
        } catch (InvalidParameterException $e) {

        }
    }

    public function testFailEmailNotSet() {
        $post = [];
        $post['cmd'] = 'signup';
        $post['login'] = 'thelegend27';
        $post['password'] = 'supersecurepassword';
        $post['firstname'] = 'Jack';
        $post['lastname'] = 'Daniels';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));

        try {
            $qp = new QueryParser($post, new DAOFactory($database));
            $this->fail("Exception expected but not thrown");
        } catch (InvalidParameterException $e) {

        }
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
        $post['citycode'] = '96458';
        $post['cityname'] = 'Ville';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));
    	$qp = new QueryParser($post, new DAOFactory($database));

    	$this->assertTrue(is_a($qp->getAction(), ActionSignUp::class));
    }
}
