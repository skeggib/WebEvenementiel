<?php

namespace WebEvents\Actions;
require_once __DIR__ . "/../autoloader.php";

use WebEvents\Response;

class ActionLogOut extends Action
{
    public function execute()
    {
        unset($_SESSION['login']);
        return new Response(array(), false);
    }
}