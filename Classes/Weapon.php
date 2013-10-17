<?php

Class Weapon extends Table {

        function __construct( array $fields) {
            $this->tableName = "weapons";
            $this->fillable = array('id', 'type', 'health_bonus', 'strength_bonus', 'intelligence_bonus', 'mana_bonus' );
            parent::__construct($fields);
        }
}