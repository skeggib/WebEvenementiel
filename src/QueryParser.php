<?php

namespace WebEvents;

include_once('Actions/ActionSignIn.php');
use WebEvents\Framework\Actions\ActionSignIn;
require_once("Actions/ActionSignUp.php");
use WebEvents\Framework\Actions\ActionSignUp;

/**
 * Create an action from an array containing the request
 */
class QueryParser
{
    private $action = null;

    /**
     * @param       array $post     Variable $_POST
     */
    public function __construct($post) {
        if (!isset($post['cmd']))
            throw new \InvalidArgumentException("The command is not set");

        switch ($post['cmd']) {

            case 'signin':
                if (!isset($post['login']))
                    throw new \InvalidArgumentException("The login is not set");
                if (!isset($post['password']))
                    throw new \InvalidArgumentException("The password is not set");
                
                $this->action = new ActionSignIn($post['login'],
                                                 $post['password']);
                break;

            case 'signup':
                if (!isset($post['login']))
                    throw new \InvalidArgumentException("The login is not set");
                if (!isset($post['password']))
                    throw new \InvalidArgumentException("The password is not set");
                if (!isset($post['firstname']))
                    throw new \InvalidArgumentException("The first name is not set");
                if (!isset($post['lastname']))
                    throw new \InvalidArgumentException("The last name is not set");
                if (!isset($post['email']))
                    throw new \InvalidArgumentException("The email is not set");
                
                $this->action = new ActionSignUp($post['login'],
                                                 $post['password'],
                                                 $post['firstname'],
                                                 $post['lastname'],
                                                 $post['email']);
                break;

            case 'listevents':
                $this->action = new ActionListEvents();
                break;
            
            default:
                throw new Exception("Undefined command");
                break;
        }
    }

    /**
     * Get the action that corresponds to the request
     */
    public function getAction() {
        return $this->action;
    }
}
