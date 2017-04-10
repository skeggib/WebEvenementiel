<?php

namespace WebEvents;

use PHPUnit\Framework\TestCase;

require_once('src/QueryParser.php');

require_once('src/Database/DAOFactory.php');
use WebEvents\Database\DAOFactory;
require_once('src/Actions/ActionGetUser.php');
use WebEvents\Actions\ActionGetUser;
use WebEvents\Database\MyDatabase;

final class QueryParserGetUserTest extends TestCase {
    
	/**
	 * @expectedException InvalidArgumentException
	 */
    public function testFailCmdNotSet() {
    	$post = [];
    	$database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));
    	$qp = new QueryParser($post, new DAOFactory($database));
    }

    public function testConstructor() {
    	$post = [];
    	$post['cmd'] = 'getuser';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));
    	$qp = new QueryParser($post, new DAOFactory($database));

    	$this->assertTrue(is_a($qp->getAction(), ActionGetUser::class));
    }
}
