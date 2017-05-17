<?php
/**
 * Created by PhpStorm.
 * User: SK250623
 * Date: 17/05/2017
 * Time: 02:22
 */

namespace WebEvents\Responses;

use WebEvents\Models\User;

class ResponseUser extends Response
{
    public function __construct(User $user)
    {
        $array = array(
            'user' => $user
        );

        parent::__construct($array);
    }
}