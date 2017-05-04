<?php

namespace WebEvents\Actions;
require_once __DIR__ . "/../autoloader.php";

use WebEvents\Database\IDAOSignIn;
use WebEvents\Response;

/**
 * Sign-in an user
 */
class ActionSignIn extends Action
{
	private $dao;
	private $login;
	private $password;

	public function __construct(IDAOSignIn $dao, $login, $password)
    {
    	$this->dao = $dao;
    	$this->login = $login;
    	$this->password = $password;
	}

	public function execute()
    {
		$validUser = $this->dao->check($this->login, $this->password);

		if ($validUser) {

			$_SESSION['login'] = $this->login;

			$array = array();
			return new Response($array, false);
		}

		else {
			$array = array();
			return new Response($array, true); // TODO:skeggib Error code
		}
	}
}
