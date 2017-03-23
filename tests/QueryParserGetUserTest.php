<?php

namespace WebEvents;

use PHPUnit\Framework\TestCase;

require_once('src/QueryParser.php');

require_once('src/Database/DAOFactory.php');
use WebEvents\Database\DAOFactory;
require_once('src/Actions/ActionGetUser.php');
use WebEvents\Actions\ActionGetUser;

final class QueryParserGetUserTest extends TestCase {
    
	/**
	 * @expectedException InvalidArgumentException
	 */
    public function testFailCmdNotSet() {
    	$post = [];
    	$qp = new QueryParser($post, new DAOFactory());
    }

    public function testConstructor() {
    	$post = [];
    	$post['cmd'] = 'getuser';
    	$qp = new QueryParser($post, new DAOFactory());

    	$this->assertTrue(is_a($qp->getAction(), ActionGetUser::class));
    }
}
