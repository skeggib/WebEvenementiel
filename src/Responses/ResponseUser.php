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
            'id' => $user->getId(),
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'active' => $user->getActive(),
            'civility' => $user->getCivility(),
            'cellphone' => $user->getCellphone(),
            'address' => array(
                'id' => $user->getAddress()->getId(),
                'cityCode' => $user->getAddress()->getCp(),
                'cityName' => $user->getAddress()->getVille()
            )
        );

        parent::__construct($array);
    }
}