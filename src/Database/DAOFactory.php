<?php

namespace WebEvents\Database;

/**
 * Creates DAOs used in other classes, the DAOs are instantiated once
 */
class DAOFactory {

    private $database;

	private $daoUser = null;
    private $daoEvent = null;
    private $daoAddress = null;

	public function __construct(IDatabase $database)
    {
        $this->database = $database;
    }

	/**
	 * Gets the user DAO
	 *
	 * @return     IDAOUser  The sign-up DAO
	 */
	public function getUserDAO()
    {
		if (is_null($this->daoUser))
		{
			$this->daoUser = new DAOUser($this->database, $this->getAddressDAO());
		}

		return $this->daoUser;
	}
    /**
     * Gets the event DAO
     *
     * @return      IDAOEvent   The event DAO
     */
    public function getEventDAO()
    {
        if(is_null($this->daoEvent))
        {
            $this->daoEvent = new DAOEvent($this->database);
        }

        return $this->daoEvent;
    }

    public function getAddressDAO()
    {
        if (is_null($this->daoAddress))
        {
            $this->daoAddress = new DAOAddress($this->database);
        }

        return $this->daoAddress;
    }
}
