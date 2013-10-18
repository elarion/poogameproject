<?php
Class User extends Table {
    protected static $tableName = 'users';
    public function __construct(Array $fields) {
        $this->relation = array('champions' => 'champions_has_users');
        $this->fillable = array('id','pseudo', 'id_session');

        parent::__construct($fields);
    }

    public function add_champion(Champion $champ) {
        $this->collections['champions'][] = $champ;
    }

    public function with($relation) {
        if ($relation !== 'champions') {
            parent::with($relation);
        }
        else {
            $q = "SELECT id_champion FROM champions_has_users WHERE id_user = ".$this->fields[$this->primaryKey]['value'];
            $data = myFetchAllAssoc($q);
            $collection = array();
            foreach ($data as $field) {
                $q = "SELECT * FROM champions WHERE id = ".$field['id_champion'];
                $data = myFetchAssoc($q);
                $instance = new $data['classe'];
                $instance->fill($data);
                $this->collections['champions'][] = $instance;
            }
        }
    }

    public function get_connected_users() {
        $q = "SELECT id_session FROM sessions";
        $datas = myFetchAllAssoc($q);
        $connected_users = array();
        foreach ($datas as $data) {
            if (isset($this->fields['id_session']['value']) && $this->fields['id_session']['value'] == $data['id_session']) continue;
              $q = "SELECT * FROM users WHERE id_session = ".$data['id_session'];
              $res = myFetchAssoc($q);
              $connected_users[] = new User($res);
        }
        return $connected_users;
    }
}