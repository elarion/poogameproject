<?php
function instance ($class) {
	$paths = array("classes" => "./Classes/".$class.".php",
				   "models" => "./model/".strtolower($class).".php",
				   "interfaces" => "./Interfaces/".$class.".php",
				   "controllers" => "./Controllers/".$class.".php"

	);

	foreach ($paths as $key => $path) {
		if (is_readable($path) && is_file($path)) {
    		require_once($path);
		}
   	}
}
spl_autoload_register('instance');

require_once 'dbtools.php';
require_once 'config.php';

// Valeur de l'action par défaut
$action = $config['default']['action'];

// Router
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// Vérification de l'existence de l'action
if (!array_key_exists($action, $config['routes'])) {
    die ("L'action ".$action." n'existe pas. <br /> <a href='index.php'>retour &agrave; l'accueil</a>");
}

// APPEL DU CONTROLLER
$method = $action.'Action';
$controller = ucfirst($config['routes'][$action]).'Controller';
${$config['routes'][$action]} = NULL;

if (!is_object(${$config['routes'][$action]})) {
	${$config['routes'][$action]} = new $controller();
}

if (method_exists(${$config['routes'][$action]}, $method)) {	
	${$config['routes'][$action]}->$method();
}

$u = new User(array('pseudo' => 'haze'));
$w = new Warrior();
$hax = new Weapon(array('name' => 'last whisper', 'strength_bonus' => 50));
$w->fill(array('name' => "Vayne" ));
$u->add_champion($w);
$u->save_collections('champions');
$w->add_weapons($hax);
$w->save_collections('weapons');

var_dump($u);



