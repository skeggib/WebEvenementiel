<?php

namespace WebEvents\Actions;

use WebEvents\Exceptions\InvalidParameterException;
use WebEvents\Models\Address;
use WebEvents\Models\Event;
use WebEvents\Database\IDAOEvent;
use WebEvents\Database\IDAOUser;
use WebEvents\Database\IDAOAddress;
use WebEvents\Responses\Response;
use WebEvents\Responses\ResponseEvent;
use WebEvents\Validation\ValidatorDate;
use WebEvents\Validation\ValidatorTime;

class ActionCreateEvent extends Action
{
	private $daoEvent;
	private $daoUser;
	private $daoAddress;

    private $validatorDate;
    private $validatorTime;

	private $name;
	private $beginDate;
	private $endDate;
    private $beginTime;
    private $endTime;
	private $streetNumber;
	private $streetName;
	private $cityCode;
	private $cityName;
	private $description;

    public function __construct(
        IDAOEvent $daoEvent,
        IDAOUser $daoUser,
        IDAOAddress $daoAddress,
        $name,
        $beginDate,
        $endDate,
        $beginTime,
        $endTime,
        $streetNumber,
        $streetName,
        $cityCode,
        $cityName,
        $description)
    {
    	$this->daoEvent = $daoEvent;
    	$this->daoUser = $daoUser;
    	$this->daoAddress = $daoAddress;

        $this->validatorDate = new ValidatorDate();
        $this->validatorTime = new ValidatorTime();

    	$this->name = $name;
        $this->beginDate = $beginDate;
        $this->endDate = $endDate;
        $this->beginTime = $beginTime;
        $this->endTime = $endTime;
        $this->streetNumber = $streetNumber;
        $this->streetName = $streetName;
        $this->cityCode = $cityCode;
        $this->cityName = $cityName;
        $this->description = $description;
	}

	public function execute()
	{
	    // Validation

        if (is_null($this->name) || trim($this->name) == "")
            throw new InvalidParameterException("name");

        if (!$this->validatorDate->validate($this->beginDate))
            throw new InvalidParameterException("beginDate");

        if (!$this->validatorTime->validate($this->beginTime))
            throw new InvalidParameterException("beginTime");

        if (!$this->validatorDate->validate($this->endDate))
            throw new InvalidParameterException("endDate");

        if (!$this->validatorTime->validate($this->endTime))
            throw new InvalidParameterException("endTime");

        if (is_null($this->streetNumber) || trim($this->streetNumber) == "")
            throw new InvalidParameterException("streetNumber");

        if (is_null($this->streetName) || trim($this->streetName) == "")
            throw new InvalidParameterException("streetName");

        if (is_null($this->cityCode) || trim($this->cityCode) == "")
            throw new InvalidParameterException("cityCode");

        if (is_null($this->cityName) || trim($this->cityName) == "")
            throw new InvalidParameterException("cityName");

        if (is_null($this->description) || trim($this->description) == "")
            throw new InvalidParameterException("description");

        // Connected user

	    $connectedUser = $this->daoUser->getConnected();

	    if (!$connectedUser)
	        return new Response(array(), true, NOT_CONNECTED);

	    // Address

	    $address = $this->daoAddress->add(new Address(
	        0,
            $this->streetNumber,
            $this->streetName,
            $this->cityName,
            $this->cityCode
        ));

	    if (!$address)
	        throw new \Exception("Cannot add address");

	    // Event

	    $event = new Event(
	        0,
            $this->name,
            $this->beginDate,
            $this->endDate,
            $this->beginTime,
            $this->endTime,
            $address,
            $this->description,
            true,
            $connectedUser
        );

	    $event = $this->daoEvent->add($event);

		if (!$event)
            throw new \Exception("Cannot add event");

        return new ResponseEvent($event);
	}
}
