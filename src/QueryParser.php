<?php

namespace WebEvents;

require_once("Database/DAOFactory.php");
use WebEvents\Database\DAOFactory;

require_once("Actions/ActionSignIn.php");
use WebEvents\Actions\ActionSignIn;
require_once("Actions/ActionSignUp.php");
use WebEvents\Actions\ActionSignUp;
require_once("Actions/ActionGetUser.php");
use WebEvents\Actions\ActionGetUser;
require_once("Actions/ActionListEvents.php");
use WebEvents\Actions\ActionListEvents;
require_once("Actions/ActionGetEvent.php");
use WebEvents\Actions\ActionGetEvent;
require_once("Actions/ActionCreateEvent.php");
use WebEvents\Actions\ActionCreateEvent;
require_once("Actions/ActionInvite.php");
use WebEvents\Actions\ActionInvite;

/**
 * Create an action from an array containing the request
 */
class QueryParser
{
    private $action = null;

    public function __construct(array $post, DAOFactory $daoFactory) {
        if (!isset($post['cmd']))
            throw new \InvalidArgumentException("The command is not set");

        switch ($post['cmd']) {

            case 'signin':
                if (!isset($post['login']))
                    throw new \InvalidArgumentException("The login is not set");
                if (!isset($post['password']))
                    throw new \InvalidArgumentException("The password is not set");
                
                $this->action = new ActionSignIn($daoFactory->getSignInDAO(),
                                                 $post['login'],
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
                
                $this->action = new ActionSignUp($daoFactory->getSignUpDAO(),
                                                 $post['login'],
                                                 $post['password'],
                                                 $post['firstname'],
                                                 $post['lastname'],
                                                 $post['email']);
                break;

            case 'getuser':
                $this->action = new ActionGetUser();
                break;

            case 'listevents':
                $this->action = new ActionListEvents();
                break;

            case 'getevent':
                if (!isset($post['id']))
                    throw new \InvalidArgumentException("The event ID is not set");
                
                $this->action = new ActionGetEvent();
                break;

            case 'createevent':
                if (!isset($post['name']))
                    throw new \InvalidArgumentException("The event name is not set");
                if (!isset($post['starttime']) || !isset($post['endtime']))
                    throw new \InvalidArgumentException("The event date is not set");

                $this->action = new ActionCreateEvent($post['name'],
                                                      $post['starttime'],
                                                      $post['endtime']);
                break;
            
            default:
                throw new \InvalidArgumentException("Undefined command");
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
