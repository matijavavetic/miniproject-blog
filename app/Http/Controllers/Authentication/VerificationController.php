<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerificationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class VerificationController extends Controller
{
    /**
     * Shows user the form to confirm their mail
     *
     * @param string $token
     * @return \Illuminate\Http\Response
     */
    public function show(string $token)
    {
        return $this->responseFactory->view('auth.mailconfirmation', compact('token'));
    }

    /**
     * Finds user by their e-mail and confirms their account based on verification token
     *
     * @param VerificationRequest $request
     * @param string $token
     * @return RedirectResponse
     * @throws
     */
    public function confirm(VerificationRequest $request, string $token)
    {
        $data = $request->validateData();

        $findUser = new User();

        $user = $findUser->where('email', $data['email'])->first();

        if ($token === $user['verification_token']) {
            $user['confirmed'] = 1;
            $user['verification_token'] = null;
            $user->save();
            $this->session->flash('success', 'Your account has been confirmed successfully.');
        } else {
            $this->session->flash('danger', 'Verification token doesnt match the user found');
            return $this->responseFactory->redirectTo('confirmation/{token}');
        }

        return $this->responseFactory->redirectToAction('Authentication\LoginController@login');
    }
}
