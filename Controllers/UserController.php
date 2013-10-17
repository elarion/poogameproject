<?php

	class UserController
	{
		public function authAction()
		{
			if (!empty($_POST['pseudo'][0]) && !empty($_POST['pseudo'][1])) {
				$players = array(
					"playerOne" => User::Find(array("pseudo" => $_POST['pseudo'][0])),
					"playerTwo" => User::Find(array("pseudo" => $_POST['pseudo'][1])),
				);

				foreach ($players as $key => $player) {
					if ($player != NULL) {

					} else {

					}
				}
			} else {

			}
		}
	}