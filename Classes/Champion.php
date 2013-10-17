<?php

abstract class Champion extends Table {
    protected $error = array();
    public function __construct( array $fields ) {
        $this->tableName = 'champions';
        $this->relation = array('weapons' => 'weapons_has_champions');
        $this->fillable = array('id', 'name','health','strength', 'intelligence','mana', 'classe' );

        $param = array_map(function($n, $m){return $n+$m;}, $fields, array('strength' => 10, 'velocity' => 30, 'intelligence' => 30, 'health_point' => 250));
        $param = array_combine(array_keys($fields), $param);
        return parent::__construct($param);

    }

    public function fill (array $fields) {
        foreach ($fields as $key => $field) {
            $this->fields[$key]['value'] = $field;
        }
    }

    public function add_weapons(Weapon $weapon) {
       $this->collections['weapons'][] = $weapon;

    }

    public function setName($name){}
    public function setStrengh($strengh){}
    public function setVelocity($velocity){}
    public function setIntelligence($intelligence){}
    public function setHealthPoint($hp){}
    public function setWeapon(Weapon $weapon){}
    public function setWeapons(Array $weapons){}

    public function getName(){}
    public function getStrengh(){}  // return player strengh + strengh bonuses from weapons
    public function getVelocity(){}
    public function getIntelligence(){}
    public function getHealthPoint(){}


}