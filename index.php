<?php
function instance ($class) {
	$paths = array("classes" => "./Classes/".ucfirst($class).".php",
				   "model" => "./model/".strtolower($class).".php",
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

// Instanciation du controller et appel de l'action
$method = $action.'Action';
$controller = ucfirst($config['routes'][$action]).'Controller';
${$config['routes'][$action]} = NULL;

if (!is_object(${$config['routes'][$action]})) {
	${$config['routes'][$action]} = new $controller();
}

if (method_exists(${$config['routes'][$action]}, $method)) {	
	${$config['routes'][$action]}->$method();
}

// Init du template
if (!empty($action)) {
	$template = './templates/'.$action.'.php';
}

include_once('./view/main.php');

$u = User::find(array('id' => 9 ));
$u->with('champions');
var_dump($u);