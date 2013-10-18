<?php

Class Battle extends Table {
    public $user_1;
    public $user_2;
    protected static $tableName = "battles";
    function __construct(array $fields) {
        $this->fillable = array('id','id_user_1','id_user_2','turn','turn_is', 'action' );
        $this->relation = array('id_user_1' => 'users', 'id_user_2' => 'users');

        parent::__construct($fields);
    }

    public function users_in_battle() {
        if (isset($this->fields['id']['value'])) {
            $this->hydrate(array('id' => $this->fields['id']['value']));
            $user_1 = User::Find($this->fields['id_user_1']['value']);
            $user_2 = User::Find($this->fields['id_user_2']['value']);
            $user_1->with('champions');
            $user_1->with('weapons');
            $user_2->with('champions');
            $user_2->with('weapons');
            $this->user_1 = $user_1;
            $this->user_2 = $user_2;
            return $this->fields['turn_is']['value'];
        }
        return FALSE;
    }

    public function round($id_user, $action) {
            $user_turn = ($this->user_1->fields['id']['value'] == $id_user ? $this->user_1 : $this->user_2);
            $advers = ($this->user_1->fields['id']['value'] == $id_user ? $this->user_2 : $this->user_1);
            $receive_action = $this->fields['action']['value'];
            if ($action == 'protect') {
                $user_turn->protection();
            }
            var_dump($this);
            if ($action != 'waiting') $advers->$receive_action($user_turn);
            $advers->save();
            $user_turn->save();
            $this->fill(array('turn_is' => $advers->id, 'action' => $action));
            $this->save();
    }


 }
