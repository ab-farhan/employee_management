<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users=User::all();

        if($request->has('search')){
            $query=$request->search;
            $users=User::where('email','like','%'.$query.'%')->orWhere('user_name','like','%'.$query.'%')->get();
        }
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'user_name' => ['required', 'string', 'max:255','unique:users'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $create= User::create([
            'user_name' => $request['user_name'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if($create){
            Session::flash('success','Successfully Register');
            return back();
        }else{
            Session::flash('error','Opps!! Failed');
            return back();
        }
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     $user=User::where('id',$id)->first();
    //     return $user;
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
         return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $id=$user->id;

       $request->validate([
            'user_name' => ['required', 'string', 'max:255','unique:users,user_name,'.$id.',id'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255',],
        ]);

        $user->update([
            'user_name' => $request['user_name'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            
        ]);

        if($user){
            Session::flash('success','Successfully Update');
            return back();
        }else{
            Session::flash('error','Opps!! Failed');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(auth()->user()->id == $user->id){
            Session::flash('error','You canot delete yourself');
            return redirect()->route('users.index');
        }

        $user->delete();

        if($user){
            Session::flash('success','Successfully Delete');
            return redirect()->route('users.index');
        }else{
            Session::flash('error','Opps!! Failed');
            return back();
        }
    }
}
