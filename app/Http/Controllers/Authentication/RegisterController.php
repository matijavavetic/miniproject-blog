<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegistrationFormRequest;
use App\Models\User;
use App\Mail\VerifyMail;

class RegisterController extends Controller
{
    /**
     * Shows registration form to the guest
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return $this->responseFactory->view('auth.register');
    }

    /**
     * Validates data and stores newly registered user
     *
     * @param RegistrationFormRequest $request
     * @return RedirectResponse
     * @throws
     */
    public function register(RegistrationFormRequest $request)
    {
        $data = $request->validateData();

        $data['verification_token'] = bin2hex(random_bytes(50));

        $user = new User();

        $user->create($data);

        $this->mail->to($data['email'])->send(new VerifyMail($data));

        $this->session->flash('success', 'You have registered successfully. You can login now.');

        return $this->responseFactory->redirectTo('home');
    }
}