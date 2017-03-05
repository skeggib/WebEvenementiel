<?php

namespace WebEvent\Database;

interface IDAOSignin {

	/**
	 * Verify that the name exists in the database and that the password is correct
	 *
	 * @param      string  $login  The login
	 * @param      string  $password  The password
	 * 
	 * @return     bool True if the username exists and if the password is correct
	 */
	public function check(string $login, string $password);
}