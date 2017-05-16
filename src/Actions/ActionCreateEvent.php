<?php

namespace WebEvents\Actions;

use WebEvents\Models\Address;
use WebEvents\Models\Event;
use WebEvents\Database\IDAOEvent;
use WebEvents\Database\IDAOUser;
use WebEvents\Database\IDAOAddress;
use WebEvents\Response;
use WebEvents\Responses\EventResponse;

class ActionCreateEvent extends Action
{
	private $daoEvent;
	private $daoUser;
	private $daoAddress;

	private $name;
	private $startdate;
	private $enddate;
    private $starttime;
    private $endtime;
	private $streetnumber;
	private $streetname;
	private $citycode;
	private $cityname;
	private $description;

    public function __construct(
        IDAOEvent $daoEvent,
        IDAOUser $daoUser,
        IDAOAddress $daoAddress,
        $name,
        $startdate,
        $enddate,
        $starttime,
        $endtime,
        $streetnumber,
        $streetname,
        $citycode,
        $cityname,
        $description)
    {
    	$this->daoEvent = $daoEvent;
    	$this->daoUser = $daoUser;
    	$this->daoAddress = $daoAddress;

    	$this->name = $name;
        $this->startdate = $startdate;
        $this->enddate = $enddate;
        $this->starttime = $starttime;
        $this->endtime = $endtime;
        $this->streetnumber = $streetnumber;
        $this->streetname = $streetname;
        $this->citycode = $citycode;
        $this->cityname = $cityname;
        $this->description = $description;
	}

	public function execute()
	{
	    $connectedUser = $this->daoUser->getConnected();

	    if (!$connectedUser)
	        return new Response(array(), true);

	    $address = $this->daoAddress->add(new Address(
	        0,
            $this->streetnumber,
            $this->streetname,
            $this->cityname,
            $this->citycode
        ));

	    if (!$address)
	        return new Response(array(), true);

	    $event = new Event(
	        0,
            $this->name,
            $this->startdate,
            $this->enddate,
            $this->starttime,
            $this->endtime,
            $address,
            $this->description,
            true,
            $connectedUser
        );

	    $event = $this->daoEvent->add($event);

		if (!$event)
			return new Response(array(), true); // TODO:skeggib Error code

        return new EventResponse($event);
	}
}
