<?php

ini_set('display_errors', 1);
ini_set('display_starup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Job;
use App\Models\Project;

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


$route = $_GET['route'] ?? '/';

if ($route == '/') {
    require '../index.php';
} elseif ($route == 'addJob') {
    require '../addjob.php';
}
