<?php

/* ActionSignUp.php
 * Anthony Vuillemin
 */

namespace WebEvents\Framework\Actions;

require_once("Action.php");

/**
 * Sign-up a new user
 */
class ActionSignUp extends Action
{
    public function __construct(string $login,
                                 string $password,
                                 string $firstname,
                                 string $lastname,
                                 string $email) {

     }

     public function execute() {
          throw new \Exception("Not implemented");
     }
}
