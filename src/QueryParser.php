<?php

namespace WebEvents;

use WebEvents\Database\DAOFactory;
use WebEvents\Actions\ActionSignIn;
use WebEvents\Actions\ActionSignUp;
use WebEvents\Actions\ActionGetUser;
use WebEvents\Actions\ActionLogOut;
use WebEvents\Actions\ActionListEvents;
use WebEvents\Actions\ActionGetEvent;
use WebEvents\Actions\ActionCreateEvent;
use WebEvents\Actions\ActionInvite;
use WebEvents\Exceptions\InvalidParameterException;

/**
 * Creates an Action from an array containing the request
 */
class QueryParser
{
    private $action = null;

    /**
     * QueryParser constructor.
     * @param array $post
     * @param DAOFactory $daoFactory
     * @throws \Exception If the command is not set or is unknown.
     * @throws \InvalidParameterException If a parameter is not set or is incorrect.
     */
    public function __construct(array $post, DAOFactory $daoFactory) {
        if (!isset($post['cmd']))
            throw new \Exception("The command is not set");

        switch ($post['cmd']) {

            case 'signin':
                if (!isset($post['login']))
                    throw new InvalidParameterException("login", "The login is not set");
                if (!isset($post['password']))
                    throw new InvalidParameterException("password", "The password is not set");
                
                $this->action = new ActionSignIn($daoFactory->getUserDAO(),
                                                 $post['login'],
                                                 $post['password']);
                break;

            case 'signup':
                if (!isset($post['login']))
                    throw new InvalidParameterException("login", "The login is not set");
                if (!isset($post['email']))
                    throw new InvalidParameterException("email", "The email is not set");
                if (!isset($post['password']))
                    throw new InvalidParameterException("password", "The password is not set");
                if (!isset($post['firstname']))
                    throw new InvalidParameterException("firstname", "The first name is not set");
                if (!isset($post['lastname']))
                    throw new InvalidParameterException("lastname", "The last name is not set");
                if (!isset($post['civility']))
                    throw new InvalidParameterException("civility", "The civility is not set");
                if (!isset($post['birthday']))
                    throw new InvalidParameterException("birthday", "The birthday is not set");
                if (!isset($post['cellphone']))
                    throw new InvalidParameterException("cellphone", "The cellphone is not set");
                if (!isset($post['citycode']))
                    throw new InvalidParameterException("citycode", "The city code is not set");
                if (!isset($post['cityname']))
                    throw new InvalidParameterException("cityname", "The city name is not set");
                
                $this->action = new ActionSignUp($daoFactory->getUserDAO(),
                    $post['login'],
                    $post['email'],
                    $post['password'],
                    $post['firstname'],
                    $post['lastname'],
                    $post['civility'],
                    $post['birthday'],
                    $post['cellphone'],
                    $post['citycode'],
                    $post['cityname']);
                break;

            case 'getuser':
                $this->action = new ActionGetUser($daoFactory->getUserDAO());
                break;

            case 'logout':
                $this->action = new ActionLogOut();
                break;

            case 'listevents':
                $this->action = new ActionListEvents();
                break;

            case 'getevent':
                if (!isset($post['id']))
                    throw new InvalidParameterException("The event ID is not set");
                
                $this->action = new ActionGetEvent();
                break;

            case 'createevent':
                if (!isset($post['name']))
                    throw new InvalidParameterException("The event name is not set");
                if (!isset($post['starttime']) || !isset($post['endtime']))
                    throw new InvalidParameterException("The event date is not set");

                $this->action = new ActionCreateEvent($post['name'],
                                                      $post['starttime'],
                                                      $post['endtime']);
                break;
            
            default:
                throw new \Exception("Undefined command");
                break;
        }
    }

    /**
     * Gets the action that corresponds to the request.
     */
    public function getAction() {
        return $this->action;
    }
}
