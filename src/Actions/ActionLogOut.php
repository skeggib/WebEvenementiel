<?php

namespace WebEvents\Actions;

use WebEvents\Responses\Response;

class ActionLogOut extends Action
{
    public function execute()
    {
        unset($_SESSION['login']);
        return new Response(array(), false);
    }
}