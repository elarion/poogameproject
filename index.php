<?php
function instance ($class) {
    require_once 'Classes/'.$class.'.php';
}
spl_autoload_register('instance');

require_once 'dbtools.php';
require_once 'model/table.php';

$u = new User(array('pseudo' => 'haze'));
$w = new Warrior();
$hax = new Weapon(array('name' => 'last whisper', 'strength_bonus' => 50));

$w->add_weapons($hax);
$w->save_collections('weapons');
$u->add_champion($w);
$u->save_collections('champions');
var_dump($u);



