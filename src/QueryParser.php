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
                if (!isset($post['firstName']))
                    throw new InvalidParameterException("firstName", "The first name is not set");
                if (!isset($post['lastName']))
                    throw new InvalidParameterException("lastName", "The last name is not set");
                if (!isset($post['civility']))
                    throw new InvalidParameterException("civility", "The civility is not set");
                if (!isset($post['birthday']))
                    throw new InvalidParameterException("birthday", "The birthday is not set");
                if (!isset($post['cellphone']))
                    throw new InvalidParameterException("cellphone", "The cellphone is not set");
                if (!isset($post['cityCode']))
                    throw new InvalidParameterException("cityCode", "The city code is not set");
                if (!isset($post['cityName']))
                    throw new InvalidParameterException("cityName", "The city name is not set");
                
                $this->action = new ActionSignUp(
                    $daoFactory->getUserDAO(),
                    $daoFactory->getAddressDAO(),
                    $post['login'],
                    $post['email'],
                    $post['password'],
                    $post['firstName'],
                    $post['lastName'],
                    $post['civility'],
                    $post['birthday'],
                    $post['cellphone'],
                    $post['cityCode'],
                    $post['cityName']);
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
                    throw new InvalidParameterException("id", "The event ID is not set");
                
                $this->action = new ActionGetEvent($daoFactory->getEventDAO(), $post['id']);
                break;

            case 'createevent':
                if (!isset($post['name']))
                    throw new InvalidParameterException("name", "The name is not set");
                if (!isset($post['beginDate']))
                    throw new InvalidParameterException("beginDate", "The start date is not set");
                if (!isset($post['endDate']))
                    throw new InvalidParameterException("endDate", "The end date is not set");
                if (!isset($post['beginTime']))
                    throw new InvalidParameterException("beginTime", "The start time is not set");
                if (!isset($post['endTime']))
                    throw new InvalidParameterException("endTime", "The end time is not set");
                if (!isset($post['streetNumber']))
                    throw new InvalidParameterException("streetNumber", "The street number is not set");
                if (!isset($post['streetName']))
                    throw new InvalidParameterException("streetName", "The street name is not set");
                if (!isset($post['cityCode']))
                    throw new InvalidParameterException("cityCode", "The city code is not set");
                if (!isset($post['cityName']))
                    throw new InvalidParameterException("cityName", "The city name is not set");
                if (!isset($post['description']))
                    throw new InvalidParameterException("description", "The description is not set");

                $this->action = new ActionCreateEvent(
                    $daoFactory->getEventDAO(),
                    $daoFactory->getUserDAO(),
                    $daoFactory->getAddressDAO(),
                    $post['name'],
                    $post['beginDate'],
                    $post['endDate'],
                    $post['beginTime'],
                    $post['endTime'],
                    $post['streetNumber'],
                    $post['streetName'],
                    $post['cityCode'],
                    $post['cityName'],
                    $post['description']
                );
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
