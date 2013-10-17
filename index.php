<?php
function instance ($class) {
    require_once 'Classes/'.$class.'.php';
}
spl_autoload_register('instance');

require_once 'dbtools.php';
require_once 'model/table.php';

$u = User::find(array('id' => 1 ));

var_dump($u);



