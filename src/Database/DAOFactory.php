<?php

namespace WebEvents\Database;

/**
 * Creates DAOs used in other classes, the DAOs are instantiated once
 */
class DAOFactory {

    private $database;

	private $daoSignIn = null;
	private $daoSignUp = null;
    private $daoEvent  = null;

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
		if (is_null($this->daoSignUp))
		{
			$this->daoSignUp = new DAOUser($this->database);
		}

		return $this->daoSignUp;
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
            // TODO create a new DAOEvent
        }
    }
}
