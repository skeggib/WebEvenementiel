<?php

namespace WebEvents\Framework;

use PHPUnit\Framework\TestCase;

include_once('src/Framework/QueryParser.php');

include_once('src/Framework/Actions/ActionSignUp.php');
use WebEvents\Framework\Actions\ActionSignUp;

final class QueryParserSignUpTest extends TestCase
{
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
    	$qp = new QueryParser($post);
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
    	$qp = new QueryParser($post);
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
    	$qp = new QueryParser($post);
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
        $qp = new QueryParser($post);
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
        $qp = new QueryParser($post);
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
        $qp = new QueryParser($post);
    }

    public function testConstructor() {

    	$post = [];
    	$post['cmd'] = 'signup';
    	$post['login'] = 'thelegend27';
    	$post['password'] = 'supersecurepassword';
        $post['firstname'] = 'Jack';
        $post['lastname'] = 'Daniels';
        $post['email'] = 'thelegend27@gmail.com';
    	$qp = new QueryParser($post);

    	$this->assertTrue(is_a($qp->getAction(), ActionSignUp::class));
    }
}
