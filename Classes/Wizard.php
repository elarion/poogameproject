<?php

Class Wizard extends Champion {

    function __construct(array $fields) {
        parent::__construct(array('strength' => -10, 'velocity' => 0, 'intelligence' => +40, 'health_point' => 100, 'mana' => 300));
        $this->auth_weapons = array('one-hand magic-sword', 'two-hand wand');
    }
}