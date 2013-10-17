<?php

abstract class Champion extends Table {
    protected $error = array();
    protected $protect = FALSE;
    protected static $tableName = 'champions';
    public function __construct( array $fields ) {

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

    public function computed_abilities($abilities) {
        if (!empty($this->fields[$abilities]['value'])) {
            $computed_val = $this->fields[$abilities]['value'];
            if (!empty($this->collections['weapons'])) {
                foreach ($this->collections['weapons'] as $weapon) {
                    $computed_val += $weapon->$abilities."_bonus";
                }

            }
            return $computed_val;
        }
        else {
            die('No value for this abitlites');
        }
    }


    public function attack(Champion $ennemy) {
        $damages = $this->computed_abilities('strength');
        $ennemy->receive_attack($damages);
    }

    public function protection() {
        $this->protect = TRUE;
    }
    public function receive_attack($damage) {
        if ($this->protect) {
            $this->fields['health']['value'] = floor($damage * ((100-75) / 100));
        }
        else {
            $this->fields['health']['value'] = $this->fields['health']['value'] - $damage;
        }
    }

    public function heal() {

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