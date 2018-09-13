<?php

namespace App\Controllers;

use App\Models\Job;
use App\Models\Project;

class AdminController extends BaseController{
    public function getIndex() {
        return $this->renderHTML('admin.twig');
    }
}