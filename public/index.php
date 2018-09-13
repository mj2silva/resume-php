<?php

ini_set('display_errors', 1);
ini_set('display_starup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

session_start();

$dotenv = new Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'username' => getenv('DB_USERNAME'),
    'database' => getenv('DB_NAME'),
    'password' => getenv('DB_PASSWORD'),
    'charset' => getenv('DB_CHARSET'),
    'collation' => getenv('DB_COLLATION'),
    'prefix' => getenv('DB_PREFIX')
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
    'action' => 'addJobActionByGet',
    'auth' => true
]);
$map->get('addProject', '/resume/projects/add', [
    'controller' => 'App\Controllers\AddProjectController',
    'action' => 'addProjectActionByGet',
    'auth' => true
]);
$map->get('addUser', '/resume/users/add', [
    'controller' => 'App\Controllers\AddUserController',
    'action' => 'addUserActionByGet',
    'auth' => true
]);
$map->get('loginForm', '/resume/login', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'loginActionByGet'
]);
$map->get('logOut', '/resume/logout', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogOut'
]);

$map->get('admin', '/resume/admin', [
    'controller' => 'App\Controllers\AdminController',
    'action' => 'getIndex',
    'auth' => true
]);

$map->post('saveUser', '/resume/users/add', [
    'controller' => 'App\Controllers\AddUserController',
    'action' => 'addUserActionByGet'
]);
$map->post('saveJobs', '/resume/jobs/add', [
    'controller' => 'App\Controllers\AddJobController',
    'action' => 'addJobActionByGet'
]);
$map->post('saveProjects', '/resume/projects/add', [
    'controller' => 'App\Controllers\AddProjectController',
    'action' => 'addProjectActionByGet'
]);
$map->post('authentication', '/resume/auth', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'loginActionByGet'
]);


$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    echo 'No route';
} else {
    $handlerData = $route->handler;
    $private = $handlerData['auth'] ?? false;
    $sessionId = $_SESSION['userId'] ?? null;
    if ($private && !$sessionId) {
        $controller = new App\Controllers\AuthController;
        $response = $controller->loginActionByGet($request);
    } else {
        $controllerName = $handlerData['controller'];
        $actionName = $handlerData['action'];
        $controller = new $controllerName;
        $response = $controller->$actionName($request);
    }

    foreach ($response -> getHeaders() as $name => $values) {
        foreach ($values as $value) {
            header(sprintf('%s: %s', $name, $value), false);
        }
    }
    http_response_code($response -> getStatusCode());
    echo $response -> getBody();
    // require $route->handler;
}