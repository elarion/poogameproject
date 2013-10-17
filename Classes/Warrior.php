<?php
Class Warrior extends Player {

    function __construct( ) {
        parent::__construct(array('strength' => 30, 'velocity' => 30, 'intelligence' => -30, 'health_point' => 100, 'mana' => 0));


    }

    /*
*	Add 20 strengh to the player
*/
    public function battleRoar(){

    }

    /*
    *	Remove [ computed strenghs] + 10 health point to the enemy
    */
	public function berserkSlam(Player enemy){

    }

	/*
	*	Remove 10 velocity to the enemy
	*/
	public function bigStomp(Player enemy){

    }

}