<?php

namespace App\Controllers;

use App\Models\Job;

class AddJobController extends BaseController{
    public function addJobActionByGet($request) {
        if ($request->getMethod() == 'POST') {
            $jobBody = $request->getParsedBody();
            $job = new Job();
            $job->title = $jobBody['title'];
            $job->description = $jobBody['description'];
            $job->save();
        }

        return $this->renderHTML('addJob.twig');
    }
}