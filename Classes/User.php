<?php
Class User extends Table {
    protected static $tableName = 'users';
    public function __construct(Array $fields) {
        $this->relation = array('champions' => array('table' => 'champions_has_users', 'model' => 'classe'));
        $this->fillable = array('id','pseudo');

        parent::__construct($fields);
    }

    public function add_champion(Champion $champ) {
        $this->collections['champions'][] = $champ;
    }

}