<?php

	class GameController
	{
		public function init_party()
		{
			if (!empty($_POST['pseudo'][0]) && !empty($_POST['pseudo'][1])) {
				$users = array(
					User::Find(array("pseudo" => $_POST['pseudo'][0])),
					User::Find(array("pseudo" => $_POST['pseudo'][1])),
				);

				foreach ($users as $key => $user) {
					if (!empty($user)) {
						$classe = $_POST['classes'][$key];
						$champions = new $classe();
						$champions->save();
						$user->add_champion($champions);
						$user->save_collections('champions');
						$user->hydrate(array("id" => $user->id));
						var_dump($user->get_collections('champions'));
						// foreach ($user->getCollections['champions'] as $key => $champion) {
						// 	$champions_key = $key;
						// }
						// $_SESSION[$user->id] = array("champions_key" => $champions_key);
						// var_dump($_SESSION);
					} else {
						$newUser = new User(array('pseudo' => $_POST['pseudo'][$key]));
						$newUser->save();
						$classe = $_POST['classes'][$key];
						$champions = new $classe();
						$champions->save();
						$newUser->add_champion($champions);
						$newUser->save_collections('champions');
						$newUser->hydrate(array("id" => $newUser->fields['id']['value']));
						// myPrint($newUser);
					}
				}

			} else {

			}
		}
	}