<?php

namespace App\Controllers;

use App\Models\Job;
use App\Models\Project;

class IndexController {
    public function indexAction() {
        $jobs = Job::all();
        $projects = Project::all();

        $name = 'Manuel';
        $lastName = 'Silva';
        $fullName = "$name $lastName";

        include '../views/index.php';
    }
}