<?php

namespace WebEvents\Database;

require_once(__DIR__ . "/IDAOSignIn.php");

class TempDAOSignIn implements IDAOSignIn {

	public function check($login, $password) {
		return ($login === 'thelegend27' && $password === 'pass');
	}

}