<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\LostPasswordMail;
use App\Models\User;

class ResetPasswordController extends Controller
{
    /**
     * Shows reset password form to the user
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return $this->responseFactory->view('auth.passwords.email');
    }

    /**
     * Sends user the e-mail to reset the password
     *
     * @param ResetPasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws
     */
    public function sendResetLinkEmail(ResetPasswordRequest $request)
    {
        $data = $request->validateData();

        $findUser = new User();

        $user = $findUser->where('email', $data['email'])->first();

        if ($user->exists()) {
            $user['lost_password_token'] = bin2hex(random_bytes(50));
            $user->save();
            $this->mail->to($user['email'])->send(new LostPasswordMail($user));
            $this->session->flash('success', 'E-mail for recovering the password has been sent.');
        }

        return $this->responseFactory->redirectTo('home');
    }

    /**
     * Shows user the form to enter new password
     *
     * @param string $token
     * @return \Illuminate\Http\Response
     */
    public function showResetForm(string $token)
    {
        return $this->responseFactory->view('auth.passwords.reset', compact('token'));
    }

    /**
     * Saves user's new password and redirects
     *
     * @param ResetPasswordRequest $request
     * @param string $token
     * @return \Illuminate\Http\RedirectResponse
     * @throws
     */
    public function reset(string $token, ResetPasswordRequest $request)
    {
        $data = $request->validateData();

        $findUser = new User();

        $user = $findUser->where('lost_password_token', $token)->first();

        if ($token === $user['lost_password_token']) {
            $user['password'] = $data['password'];
            $user['lost_password_token'] = null;
            $user->save();
            $this->session->flash('success', 'Your password has been reset.');
        } else {
            $this->session->flash('danger', 'Token doesnt match the user found.');
            return $this->responseFactory->redirectTo('password/reset/{token}');
        }

        return $this->responseFactory->redirectTo('home');
    }
}
