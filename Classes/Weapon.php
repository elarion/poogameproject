<?php

Class Weapon extends Table {
        protected static $tableName = "weapons";
        function __construct( array $fields) {
            $this->fillable = array('id', 'type', 'health_bonus', 'strength_bonus', 'intelligence_bonus', 'mana_bonus' );
            parent::__construct($fields);
        }
}