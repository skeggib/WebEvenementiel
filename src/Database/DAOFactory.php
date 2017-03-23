<?php

namespace WebEvents\Database;

require_once("IDAOSignIn.php");
require_once("IDAOSignUp.php");

/**
 * Creates DAOs used in other classes, the DAOs are instantiated once
 */
class DAOFactory {

	private $daoSignin = null;
	private $daoSignup = null;

	public function __construct() {

	}

	/**
	 * Gets the sign-in DAO
	 *
	 * @return     IDAOSignIn  The sign-in DAO
	 */
	public function getSignInDAO() {
		if ($this->daoSignin === null)
		{
			// TODO create a new DAOSignin
		}

		return $this->daoSignin;
	}

	/**
	 * Gets the sign-up DAO
	 *
	 * @return     IDAOSignUp  The sign-up DAO
	 */
	public function getSignUpDAO() {
		if ($this->daoSignup === null)
		{
			// TODO create a new DAOSignup
		}

		return $this->daoSignup;
	}

}