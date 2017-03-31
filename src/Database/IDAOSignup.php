<?php

namespace WebEvent\Database;

interface IDAOSignUp {

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
	public function signup($username,
						   $email,
						   $password,
						   $firstname,
						   $lastname,
						   $civility,
						   $birthday,
						   $cellphone,
						   $cp,
						   $town);
}
