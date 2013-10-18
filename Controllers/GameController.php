<?php

	class GameController
	{

		public function init_party()
		{
            global $template;
            $user1_name = $_POST['pseudo'][0];
            $user1_class = $_POST['classes'][0];
            if (($user1 = User::find(array('pseudo' => $user1_name))) === NULL) {
                $user1 = new User(array('pseudo' => $user1_name, 'id_session' => session_id()));
                $user1->save();
                $user1_champ = new $user1_class();
                $user1->add_collection($user1_champ, 'champions');
                $user1->save_collections('champions');
            }
            else {
                $user1->with('champions');
            }
            $connected = $user1->get_connected_users();
            $template = 'waiting';
            return array('connected_users' => $connected,'user' => $user1);
		}

        public function action() {

            global $template;
            $id_battle = $_SESSION['battle'];
            $battle = new Battle(array('id' => $id_battle));
            $battle->users_in_battle();
            $id = $_POST['id_user'];
            $action = $_POST['method'];
            $battle->round($id,$action);
            $template = 'battle';

            return array('user1' => $battle->user_1, 'user2' => $battle->user_2, 'turn_is' => $battle->turn_is, "champion_user1" => $battle->user_1->get_collection('champions'), "champion_user2" => $battle->user_2->get_collection('champions'));
        }
	}