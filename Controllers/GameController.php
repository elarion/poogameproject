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

						foreach ($user->get_collections('champions') as $key => $champion) {
							$champions_key = $key;
						}
						$_SESSION[$user->id] = array("champions_key" => $champions_key);
						session_write_close();

						header('location: index.php?action=battle');
					} else {
						$newUser = new User(array('pseudo' => $_POST['pseudo'][$key]));
						$newUser->save();

						$classe = $_POST['classes'][$key];
						$champions = new $classe();
						$champions->save();
						$newUser->add_champion($champions);
						$newUser->save_collections('champions');

						$newUser->hydrate(array("id" => $newUser->fields['id']['value']));
						foreach ($newUser->get_collections('champions') as $key => $champion) {
							$champions_key = $key;
						}
						$_SESSION[$user->id] = array("champions_key" => $champions_key);
						session_write_close();

						header('location: index.php?action=battle');
					}
				}
			} else {

			}
		}
	}