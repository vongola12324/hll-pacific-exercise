<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param Request $request
     * @return RedirectResponse
     *
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'     => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'unique:users'],
                'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'confirmed', 'min:8'],
            ]
        );

        Auth::login(
            $user = User::create(
                [
                    'name'     => $request->get('name'),
                    'username' => $request->get('username'),
                    'email'    => $request->get('email'),
                    'password' => Hash::make($request->get('password')),
                ]
            )
        );

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
