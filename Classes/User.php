<?php
Class User extends Table {
    protected static $tableName = 'users';
    public function __construct(Array $fields) {
        $this->relation = array('champions' => 'champions_has_users');
        $this->fillable = array('pseudo');

        parent::__construct($fields);
    }

    public function add_champion(Champion $champ) {
        $this->collections['champions'][] = $champ;
    }

}