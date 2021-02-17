<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function changePasswordView()
    {
        return view('manage.profile.password');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function doPasswordChange(Request $request): RedirectResponse
    {
        $this->validate(
            $request,
            [
                'old_password' => ['required', 'string'],
                'new_password' => ['required', 'string', 'confirm'],
            ]
        );
        /** @var User $user */
        $user = auth()->user();
        if (Hash::check($request->get('old_password'), $user->password)) {
            $user->update(
                [
                    'password' => Hash::make($request->get('new_password')),
                ]
            );
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }
}
