<?php

Class Tank extends Champion {

    function __construct( ) {
        parent::__construct(array('strength' => -60, 'intelligence' => 0, 'health' => +450));


    }

    public function secondaryComp(Player $enemy){


    }

	public function mainComp(Player $enemy){

    }

}