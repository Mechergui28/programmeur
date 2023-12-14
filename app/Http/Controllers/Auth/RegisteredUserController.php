<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use HasRoles;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // $path = 'storage/users-avatar';
        // $fontPath = public_path('fonts/Oliciy.ttf');
        // $char = strtoupper($request->name[0]);
        // $newAvatarName = rand(12,34353).time().'_avatar.png';
        // $dest = $path.$newAvatarName;
        // $createAvatar = makeAvatar($fontPath,$dest,$char);
        // $avatar = $createAvatar == true ? $newAvatarName : '';


         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->avatar = $request->avatar;
         $user-> assignRole('user');
         $user->password = \Hash::make($request->password);
         $user->save();


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
