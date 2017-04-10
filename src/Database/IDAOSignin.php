<?php

namespace WebEvents\Database;

interface IDAOSignIn {

	/**
	 * Verify that the name exists in the database and that the password is correct
	 *
	 * @param      string  $login  The login
	 * @param      string  $password  The password
	 * 
	 * @return     bool True if the username exists and if the password is correct
	 */
	public function check($login, $password);

    /**
     * @return User The connected user if there is one, false if there is no connected user
     */
	public function getUser();
}