<?php

require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
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

if (!empty($_POST)) {
    $project = new Project();
    $project->name = $_POST['name'];
    $project->description = $_POST['description'];
    $project->save();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Add Job</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class = "container">
        <h1>Add Project Form:</h1>
        <form action = "addProject.php" method = "post">
            <label for "">Name:</label>
            <input type = "text" name = "name"> </br>
            <label for "">Description:</label>
            <input type = "text" name = "description"></br>
            <button type = "submit">Save new project</button>
        </form>
    </div>
</body>
</html>