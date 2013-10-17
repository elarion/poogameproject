<?php

class Tank extends Champion {

    function __construct( )
    {
        parent::__construct(array('strength' => -60, 'intelligence' => 0, 'health' => +450));
        $this->add_weapons(new Weapon(array('name' => 'Shield of concrete','health_bonus' => 10)));
    }

    public function secondaryComp(Player $enemy)
    {

    }

	public function mainComp(Player $enemy)
    {

    }

}