<?php

	class UserController
	{
		public function authAction()
		{
			if (!empty($_POST['pseudo'][0]) && !empty($_POST['pseudo'][1])) {
				$players = array(
					User::Find(array("pseudo" => $_POST['pseudo'][0])),
					User::Find(array("pseudo" => $_POST['pseudo'][1])),
				);

				foreach ($players as $key => $player) {
					if (!empty($player)) {

					} else {
						// $u = new User(array("pseudo" => $_POST['pseudo'][$key]));
						// var_dump($u);
					}
				}
			} else {

			}
		}
	}