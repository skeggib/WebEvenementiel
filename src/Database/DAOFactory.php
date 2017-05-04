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
	 * Gets the sign-in DAO
	 *
	 * @return     IDAOSignIn  The sign-in DAO
	 */
	public function getSignInDAO()
    {
		if (is_null($this->daoSignIn))
		{
			$this->daoSignIn = new DAOSignIn($this->database);
		}

		return $this->daoSignIn;
	}

	/**
	 * Gets the sign-up DAO
	 *
	 * @return     IDAOSignUp  The sign-up DAO
	 */
	public function getSignUpDAO()
    {
		if (is_null($this->daoSignUp))
		{
			$this->daoSignUp = new DAOSignUp($this->database);
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
