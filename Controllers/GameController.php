<?php

	class GameController
	{

		public function init_party()
		{
            global $template;
            $user1_name = $_POST['pseudo'][0];
            $user1_class = $_POST['classes'][0];
            $user2_name = $_POST['pseudo'][1];
            $user2_class = $_POST['classes'][1];
            $user1 = new User(array('pseudo' => $user1_name));
            $user1->save();
            $user1_champ = new $user1_class();
            $user1->add_collection($user1_champ);
            $user1->save_collections('champions');
            $user2 = new User(array('pseudo' => $user2_name));
            $user2->save();
            $user2_champ = new $user2_class();
            $user2->add_collection($user2_champ);
            $user2->save_collections('champions');
            $n = rand(1,2);
            $battle = new Battle(array('id_user_1' => $user1->id, 'id_user_2' => $user2->id, 'turn_is' => $user{$n}->id));
            $battle->save();
            $_SESSION['battle'] = $battle->id;
            $template = 'battle';
		}


        public function action() {
            global $template;
            $id_battle = $_SESSION['battle'];
            $battle = new Battle(array('id' => $id_battle));
            $battle->users_in_battle();
            $id = $_POST['id_user'];
            $action = $_POST['action'];
            $battle->round($id,$action);
            $template = 'battle';
        }
	}