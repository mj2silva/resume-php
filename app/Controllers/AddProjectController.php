<?php

namespace App\Controllers;

use App\Models\Project;

class AddProjectController extends BaseController {
    public function addProjectActionByGet($request) {
        if ($request->getMethod() == 'POST') {    
            $projectBody = $request->getParsedBody();
            $project = new Project();
            $project->name = $projectBody['name'];
            $project->description = $projectBody['description'];
            $project->save();
        }

        return $this->renderHTML('addProject.twig');
    }
}