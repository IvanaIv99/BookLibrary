<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function processLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        if ($validator->fails() ){
            return response()->json(['errors'=>$validator->errors(),'status' => false]);
        }

        $user = User::where('email',$request->email)->first();

        if(!Hash::check($request->password, $user->password)){
            return response()->json(['errors'=> ['password'=>'Password is incorrect'],'status' => false]);
        }

        $credentials = $request->except(['_token']);

        if (auth()->attempt($credentials)) {
            if(auth()->user()->user_type_id == 1){
                return response()->json([
                    "status" => true,
                    "redirect" => url("/librarian/dashboard")
                ]);
            }else if(auth()->user()->user_type_id == 2){
                return response()->json([
                    "status" => true,
                    "redirect" => url("/reader/dashboard")
                ]);
            }
        }

       return redirect()->route('home');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
