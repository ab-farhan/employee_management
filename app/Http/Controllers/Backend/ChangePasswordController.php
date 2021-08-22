<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ChangePasswordController extends Controller
{
    //for chage password
    public function changePassword(Request $request, User $user){
        $request->validate([
            'password' => ['required','min:8',],
            'password_confirmation' => ['required','min:8', 'same:password'],
        ]);

        $user->update([
            
            'password' => Hash::make($request['password']),
        ]);

        if($user){
            Session::flash('success','Successfully update password');
            return redirect()->route('users.index');
        }else{
            Session::flash('error','Opps!! Failed');
            return back();
        }
            
    }
}
