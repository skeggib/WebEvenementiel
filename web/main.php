<?php

session_start();

require_once __DIR__ . "/../src/autoloader.php";

use WebEvents\Database\MyDatabase;
use WebEvents\Configuration;
use WebEvents\QueryParser;
use WebEvents\Responses\Response;
use WebEvents\Sender;
use WebEvents\Database\DAOFactory;
use WebEvents\Exceptions\InvalidParameterException;

$sender = new Sender();

// Error codes :
define("MISSING_PARAM", 1);
define("INVALID_PARAM", 2);
define("NOT_CONNECTED", 3);

try
{
    $database = MyDatabase::fromConfiguration(new Configuration("../webevents.ini"));
    $daoFactory = new DAOFactory($database);
    $parser = new QueryParser($_POST, $daoFactory);    
    $action = $parser->getAction();
    $response = $action->execute();
    $sender->send($response);
}

catch (InvalidParameterException $e)
{
    $sender->send(new Response(
        array('parameterName' => $e->getParameterName()),
        true, MISSING_PARAM));
}

catch (NotImplementedException $e) {
    error_log("[WebEvenementiel] NotImplementedException: " . $e->getMessage());
    $sender->sendError(501); // 501 Not Implemented
}

catch (Exception $e)
{
    error_log("[WebEvenementiel] Exception: " . $e->getMessage());
    $sender->sendError(500); // 500 Internal Server Error
}