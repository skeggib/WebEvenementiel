<?php

session_start();

require_once  __DIR__ . "/../src/Database/MyDatabase.php";
use WebEvents\Database\MyDatabase;
require_once __DIR__ . "/../src/Configuration.php";
use WebEvents\Configuration;
require_once(__DIR__ . "/../src/QueryParser.php");
use WebEvents\QueryParser;
require_once(__DIR__ . "/../src/Actions/Action.php");
use WebEvents\Actions\Action;
require_once(__DIR__ . "/../src/Response.php");
use WebEvents\Response;
require_once(__DIR__ . "/../src/Sender.php");
use WebEvents\Sender;
require_once(__DIR__ . "/../src/Database/DAOFactory.php");
use WebEvents\Database\DAOFactory;

require_once(__DIR__ . "/../src/Exceptions/NotImplementedException.php");
require_once(__DIR__ . "/../src/Exceptions/MissingParameterException.php");

$sender = new Sender();

// Error codes :
define("MISSING_PARAM", 1);
define("INVALID_PARAM", 2);

try
{
    $database = MyDatabase::fromConfiguration(new Configuration("../webevents.ini"));
    $daoFactory = new DAOFactory($database);
    $parser = new QueryParser($_POST, $daoFactory);    
    $action = $parser->getAction();
    $response = $action->execute();
    $sender->send($response);
}

catch (MissingParameterException $e)
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