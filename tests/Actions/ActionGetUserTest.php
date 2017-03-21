<?php

namespace WebEvents\Actions;

use PHPUnit\Framework\TestCase;

include_once('src/Actions/ActionSignUp.php');
include_once('src/Actions/ActionSignIn.php');
include_once('src/Actions/ActionGetUser.php');

final class ActionGetUserTest extends TestCase {

    public function testAll() {
        $getuser = new ActionGetUser();
        $getuser->execute();

        $signup = new ActionSignUp("thelegend27", "password", "Jonh", "Smith", "thelegend27@gmail.com");
        $signup->execute();

        $signin = new ActionSignIn("thelegend27", "password");
        $signin->execute();
    }
}
