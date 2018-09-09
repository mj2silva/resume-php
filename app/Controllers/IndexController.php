<?php

namespace App\Controllers;

use App\Models\Job;
use App\Models\Project;

class IndexController extends BaseController{
    public function indexAction() {
        $jobs = Job::all();
        $projects = Project::all();

        $name = 'Manuel';
        $lastName = 'Silva';
        $fullName = "$name $lastName";

        return $this->renderHTML('index.twig', [
            'fullName' => $fullName,
            'jobs' => $jobs
        ]);
    }
}