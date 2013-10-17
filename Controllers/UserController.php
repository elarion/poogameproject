<?php

	class UserController
	{
		public function authAction()
		{
			if (!empty($_POST) && !empty($_POST['pseudo'])) {
				$user = User::Find(array("pseudo" => $_POST['pseudo']));

				if ($user != NULL) {

				} else {

				}
			}
		}
	}