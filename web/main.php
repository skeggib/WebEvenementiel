<?php

session_start();

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

/*function errorHandler($errno, $errstr) {
    $sender = new Sender();
    $sender->sendError(500);
}
set_error_handler("errorHandler", E_ALL);

function shut(){
    $error = error_get_last();
    errorHandler($error['type'], $error['message']);
}
register_shutdown_function('shut');*/

$sender = new Sender();

try
{
    $daoFactory = new DAOFactory();
    $parser = new QueryParser($_POST, $daoFactory);
    $action = $parser->getAction();
    $response = $action->execute();
    $sender->send($response);
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