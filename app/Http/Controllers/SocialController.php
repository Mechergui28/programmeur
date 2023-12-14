<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

     // Google login
     public function redirectToGoogle()
     {
         return Socialite::driver('google')->redirect();
     }

     // Google callback
     public function handleGoogleCallback()
     {
         $user = Socialite::driver('google')->stateless()->user();

         $this->_registerOrLoginUser($user);

         // Return welcome after login
         return redirect()->route('welcome');
     }

     // Facebook login
     public function redirectToFacebook()
     {
         return Socialite::driver('facebook')->redirect();
     }

     // Facebook callback
     public function handleFacebookCallback()
     {
         $user = Socialite::driver('facebook')->stateless()->user();

         $this->_registerOrLoginUser($user);

         // Return welcome after login
         return redirect()->route('welcome');
     }

     // Github login
     public function redirectToGithub()
     {
         return Socialite::driver('github')->redirect();
     }

     // Github callback
     public function handleGithubCallback()
     {
         $user = Socialite::driver('github')->stateless()->user();

         $this->_registerOrLoginUser($user);

         // Return welcome after login
         return redirect()->route('welcome');
     }

     protected function _registerOrLoginUser($data)
     {
         $user = User::where('email', '=', $data->email)->first();
         if (!$user) {
             $user = new User();
             $user->name = $data->name;
             $user->email = $data->email;
             $user->provider_id = $data->id;
             $user->avatar = $data->avatar;
             $user-> assignRole('user');
             $user->save();
         }

         Auth::login($user);
     }

}
