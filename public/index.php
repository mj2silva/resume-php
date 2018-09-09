<?php

ini_set('display_errors', 1);
ini_set('display_starup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'resume',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();
$map->get('index','/resume/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction'
]);
$map->get('addJobs','/resume/jobs/add', [
    'controller' => 'App\Controllers\AddJobController',
    'action' => 'addJobActionByGet'
]);
$map->get('addProject', '/resume/projects/add', [
    'controller' => 'App\Controllers\AddProjectController',
    'action' => 'addProjectActionByGet'
]);

$map->post('saveJobs', '/resume/jobs/add', [
    'controller' => 'App\Controllers\AddJobController',
    'action' => 'addJobActionByGet'
]);
$map->post('saveProjects', '/resume/projects/add', [
    'controller' => 'App\Controllers\AddProjectController',
    'action' => 'addProjectActionByGet'
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    echo 'No route';
} else {
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $controller = new $controllerName;
    $controller->$actionName($request);
    // require $route->handler;
}

function printElement($element) {
    echo '<li class="work-position">';
    
    if ($element->title) {
        echo '<h5>' . $element->title . '</h5>';
    } else {
        echo '<h5>' . $element->name . '</h5>';
    }

    echo '<p>' . $element->description . '</p>';
    echo '<p>' . $element->getFormatDuration() . '</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>';
}