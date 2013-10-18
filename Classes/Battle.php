<?php

Class Battle extends Table {
    function __construct(array $fields) {
        $this->fillable = array('id','id_user_1','id_user_2','turn','turn_is' );
        $this->relation = array('id_user_1' => 'users', 'id_user_2' => 'users');
        parent::__construct($fields);
    }

}