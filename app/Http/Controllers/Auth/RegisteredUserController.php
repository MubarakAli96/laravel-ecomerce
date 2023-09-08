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
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'role' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'g-recaptcha-response' => 'recaptcha',
        ]);
        if ($request->hasFile('profile_image')) {
            $img = $request->profile_image;
            $num = rand(1, 999);
            $number = $num / 7;
            $extension = $img->extension();
            $fileNewName = date('Y-M-D') . "_" . $number . "_" . $extension;
            $fileNamePath = 'upload/profile_image/' . $fileNewName;
            $filepath = $img->move(public_path('upload/profile_image/'), $fileNamePath);
        }

        $user = User::create([
            // 'profile_image' => $fileNamePath,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone_no' => $request->phone_no,
            'facebook_link' => $request->facebook_link,
            'insta_link' => $request->insta_link,
            'twiter_link' => $request->twiter_link,

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
