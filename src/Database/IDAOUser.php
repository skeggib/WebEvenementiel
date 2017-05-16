<?php

namespace WebEvents\Database;

use WebEvents\Models\User;

interface IDAOUser {

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
    public function getConnected();

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
	public function add(User $user);

    /**
     * Checks if an user exists in the database
     * @param $login
     * @returns boolean True if the user exists
     */
    public function exists($login);
}
