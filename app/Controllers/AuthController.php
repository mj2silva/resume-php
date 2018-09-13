<?php

namespace App\Controllers;

use App\Models\User;
use Zend\Diactoros\Response\RedirectResponse;

class AuthController extends BaseController
{
    public function loginActionByGet($request)
    {
        $responseMessage = null;
        $errorMessage = 'Wrong email or password, please try again';
        $successMessage = 'Correct password';
        if ($request->getMethod() == 'POST') {
            $userBody = $request->getParsedBody();
            $user = User::where('email', $userBody['email'])->first();
            if ($user) {
                if (password_verify($userBody['password'], $user->password)) {
                    $responseMessage = $successMessage;
                    $_SESSION['userId'] = $user -> id;
                    return new RedirectResponse('/resume/admin');
                } else {
                    $responseMessage = $errorMessage;
                }
            } else {
                $responseMessage = $errorMessage;
            }
            // $user = new User();
            // $user->name = $userBody['name'];
            // $user->email = $userBody['email'];
            // $user->password = password_hash($userBody['password'], PASSWORD_DEFAULT);
            // $user->save();
        }

        return $this->renderHTML('login.twig', [
            'responseMessage' => $responseMessage
        ]);
    }

    public function getLogOut() {
        unset($_SESSION['userId']);
        return new RedirectResponse('/resume/login');
    }
}