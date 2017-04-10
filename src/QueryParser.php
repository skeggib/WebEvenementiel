<?php

namespace WebEvents;

require_once(__DIR__ . "/Database/DAOFactory.php");
use WebEvents\Database\DAOFactory;

require_once(__DIR__ . "/Actions/ActionSignIn.php");
use WebEvents\Actions\ActionSignIn;
require_once(__DIR__ . "/Actions/ActionSignUp.php");
use WebEvents\Actions\ActionSignUp;
require_once(__DIR__ . "/Actions/ActionGetUser.php");
use WebEvents\Actions\ActionGetUser;
require_once(__DIR__ . "/Actions/ActionListEvents.php");
use WebEvents\Actions\ActionListEvents;
require_once(__DIR__ . "/Actions/ActionGetEvent.php");
use WebEvents\Actions\ActionGetEvent;
require_once(__DIR__ . "/Actions/ActionCreateEvent.php");
use WebEvents\Actions\ActionCreateEvent;
require_once(__DIR__ . "/Actions/ActionInvite.php");
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
                if (!isset($post['email']))
                    throw new \InvalidArgumentException("The email is not set");
                if (!isset($post['password']))
                    throw new \InvalidArgumentException("The password is not set");
                if (!isset($post['firstname']))
                    throw new \InvalidArgumentException("The first name is not set");
                if (!isset($post['lastname']))
                    throw new \InvalidArgumentException("The last name is not set");
                if (!isset($post['civility']))
                    throw new \InvalidArgumentException("The civility is not set");
                if (!isset($post['birthday']))
                    throw new \InvalidArgumentException("The birthday is not set");
                if (!isset($post['cellphone']))
                    throw new \InvalidArgumentException("The cellphone is not set");
                if (!isset($post['cp']))
                    throw new \InvalidArgumentException("The cp is not set");
                if (!isset($post['town']))
                    throw new \InvalidArgumentException("The town is not set");
                
                $this->action = new ActionSignUp($daoFactory->getSignUpDAO(),
                    $post['login'],
                    $post['email'],
                    $post['password'],
                    $post['firstname'],
                    $post['lastname'],
                    $post['civility'],
                    $post['birthday'],
                    $post['cellphone'],
                    $post['cp'],
                    $post['town']);
                break;

            case 'getuser':
                $this->action = new ActionGetUser($daoFactory->getSignInDAO());
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
