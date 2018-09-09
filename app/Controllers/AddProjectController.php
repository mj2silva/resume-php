<?php

namespace App\Controllers;

use App\Models\Project;

class AddProjectController {
    public function addProjectActionByGet() {
        if (!empty($_POST)) {
            $project = new Project();
            $project->name = $_POST['name'];
            $project->description = $_POST['description'];
            $project->save();
        }

        include '../views/addProject.php';
    }
}