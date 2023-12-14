<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{


    public function SignUp(Request $request)
    {
        $check=User::where("account_type",$request->account_type)->where("email",$request->email)->first();
if(!$check){
    if ($request->password) {
        $user = User::create([

            'name' => $request->name,
            'account_type' => $request->account_type,
            'email' => $request->email,
            'password' => Hash::make($request->password),


        ]);
        $token = $user->createToken('Personal Access Token')->plainTextToken;

        return response()->json($user, 200);
    } else {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $request->avatar,
            'account_type' => $request->account_type,
        ]);
        $token = $user->createToken('Personal Access Token')->plainTextToken;
        $response = ['user' => $user, 'token' => $token];
        return response()->json($user, 200);
    }
}         return response()->json($check, 202);


    }

    public function SignIn(Request $request)
    {
        $user = User::where('email', $request->email)->where('account_type', $request->account_type)->first();
        if ($request->password) {


            if ($user && Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Personal Access Token')->plainTextToken;

                return response()->json($user, 200);
            }
            return response()->json([], 400);
        } else {
            $user = User::where('email', $request->email)->where('account_type', $request->account_type)->first();
            if ($user) {
                $token = $user->createToken('Personal Access Token')->plainTextToken;

                return response()->json($user, 200);
            }
            return response()->json([], 400);
        }

    }
public function  getUsers($id){
        $users=User::where("id",'!=',$id)->get();
    return response()->json($users, 200);
}
}
