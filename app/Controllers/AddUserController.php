<?php

namespace App\Controllers;

use App\Models\User;

class AddUserController extends BaseController
{
    public function addUserActionByGet($request)
    {
        if ($request->getMethod() == 'POST') {
            $userBody = $request->getParsedBody();
            $user = new User();
            $user->name = $userBody['name'];
            $user->email = $userBody['email'];
            $user->password = password_hash($userBody['password'], PASSWORD_DEFAULT);
            $user->save();
        }

        return $this->renderHTML('addUser.twig');
    }
}