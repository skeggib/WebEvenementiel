<?php

namespace WebEvent\Database;

interface IDAOSignup {

	/**
	 * Add a new user in the database
	 *
	 * @param      string  $login      The login
	 * @param      string  $password   The password
	 * @param      string  $firstname  The firstname
	 * @param      string  $lastname   The lastname
	 * @param      string  $email      The email
	 * 
	 * @return     bool True if the user was added
	 */
	public function signup(	string $login,
							string $password,
							string $firstname,
							string $lastname,
							string $email);
}