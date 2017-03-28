<?php

namespace WebEvents\Database;

require_once(__DIR__ . "/IDAOSignIn.php");
require_once(__DIR__ . "/TempDAOSignIn.php");

require_once(__DIR__ . "/IDAOSignUp.php");

require_once(__DIR__ . "/IDAOEvent.php");

/**
 * Creates DAOs used in other classes, the DAOs are instantiated once
 */
class DAOFactory {

	private $daoSignIn = null;
	private $daoSignUp = null;
    private $daoEvent  = null;

	public function __construct()
    {
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
			$this->daoSignIn = new TempDAOSignIn(); // TODO:skeggib Remove
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
			// TODO create a new DAOSignup
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
