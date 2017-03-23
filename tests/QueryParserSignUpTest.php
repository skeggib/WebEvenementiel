<?php

namespace WebEvents;

use PHPUnit\Framework\TestCase;

require_once('src/QueryParser.php');

require_once('src/Database/DAOFactory.php');
use WebEvents\Database\DAOFactory;
require_once('src/Actions/ActionSignUp.php');
use WebEvents\Actions\ActionSignUp;

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
    	$qp = new QueryParser($post, new DAOFactory());
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
    	$qp = new QueryParser($post, new DAOFactory());
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
    	$qp = new QueryParser($post, new DAOFactory());
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
        $qp = new QueryParser($post, new DAOFactory());
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
        $qp = new QueryParser($post, new DAOFactory());
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
        $qp = new QueryParser($post, new DAOFactory());
    }

    public function testConstructor() {

    	$post = [];
    	$post['cmd'] = 'signup';
    	$post['login'] = 'thelegend27';
    	$post['password'] = 'supersecurepassword';
        $post['firstname'] = 'Jack';
        $post['lastname'] = 'Daniels';
        $post['email'] = 'thelegend27@gmail.com';
    	$qp = new QueryParser($post, new DAOFactory());

    	$this->assertTrue(is_a($qp->getAction(), ActionSignUp::class));
    }
}
