<?php

namespace WebEvents;
require_once __DIR__ . "/autoloader.php";

use PHPUnit\Framework\TestCase;

use WebEvents\Database\DAOFactory;
use WebEvents\Actions\ActionGetUser;
use WebEvents\Database\MyDatabase;
use WebEvents\Exceptions\InvalidParameterException;

final class QueryParserGetUserTest extends TestCase {

    public function testFailCmdNotSet() {
    	$post = [];
    	$database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));

        try {
            $qp = new QueryParser($post, new DAOFactory($database));
            $this->fail("Exception expected but not thrown");
        } catch (\Exception $e) {

        }
    }

    public function testConstructor() {
    	$post = [];
    	$post['cmd'] = 'getuser';
        $database = MyDatabase::fromConfiguration(new Configuration("webevents.ini"));
    	$qp = new QueryParser($post, new DAOFactory($database));

    	$this->assertTrue(is_a($qp->getAction(), ActionGetUser::class));
    }
}
