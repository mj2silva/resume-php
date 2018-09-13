<?php

namespace App\Controllers;

use App\Models\Job;
use Respect\Validation\Validator;

class AddJobController extends BaseController{
    public function addJobActionByGet($request) {
        $responseMessage = null;

        if ($request->getMethod() == 'POST') {
            $jobBody = $request->getParsedBody();
            $jobValidator = Validator::key('title', Validator::stringType()->notEmpty())
                            ->key('description', Validator::stringType()->notEmpty());
            
            try {
                $jobValidator->assert($jobBody);
                
                $files = $request->getUploadedFiles();
                $logo = $files['logo'];
                
                if ($logo->getError() == UPLOAD_ERR_OK) {
                    $fileName = $logo->getClientFilename();
                    $logo->moveTo("img/uploads/$fileName");
                }
                
                $job = new Job();
                $job->title = $jobBody['title'];
                $job->description = $jobBody['description'];
                $job->logo_route = "img/uploads/$fileName";
                $job->save();
                $responseMessage = 'Saved';
            } catch (\Exception $e) {
                $responseMessage = $e->getMessage();
            }
                            
            
        }

        return $this->renderHTML('addJob.twig', [
            'responseMessage' => $responseMessage
        ]);
    }
}