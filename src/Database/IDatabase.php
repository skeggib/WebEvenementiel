<?php

namespace WebEvents\Database;

interface IDatabase {

	/**
	 * Executes a query on the database
	 *
	 * @param      string  $query  The query
	 * @return     PDOStatement The response or false if there was an error
	 */
	public function query($query);

    /**
     * @param string $password
     * @return string
     */
	public function hash($password);
}