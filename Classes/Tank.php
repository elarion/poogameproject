<?php

class Tank extends Champion {

    function __construct( )
    {
        parent::__construct(array('strength' => -60, 'intelligence' => 0, 'health' => +450));
        $this->fill(array('name' => 'Alistar'));
        $this->add_weapons(new Weapon(array('name' => 'Shield of concrete','health_bonus' => 10)));
    }

    public function secondaryComp(Champion $enemy)
    {
        $this->fields['health']['value'] += 20;
        $dmg = $this->computed_abilities('strength');
        $enemy->receive_attack($dmg);
    }

	public function mainComp(Champion $enemy)
    {

    }

}