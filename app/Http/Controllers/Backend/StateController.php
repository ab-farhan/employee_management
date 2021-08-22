<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $state=State::all();
        if($request->has('search')){
            $state=State::where('name','like','%'.$request->search.'%')->get();
        }
        return view('state.index',compact('state'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country=Country::all();
        return view('state.create',compact('country'));
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
            'name' => ['required', 'string', 'max:20','unique:states'],
            'country_id' => ['required'],
        ]);

        $create=State::create([
            'name' => $request['name'],
            'country_id' => $request['country_id'],
        ]);

        if($create){
            Session::flash('success','Successfully Register a State');
            return redirect()->route('state.index');
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
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        $country=Country::all();
        return view('state.edit',compact('state','country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $id=$state->id;
        $request->validate([
            'name' => ['required', 'string', 'max:20','unique:states,name,'.$id.'id'],
            'country_id' => ['required'],
        ]);

        $state->update([
            'name' => $request['name'],
            'country_id' => $request['country_id'],
        ]);

        if($state){
            Session::flash('success','Successfully Update a State');
            return redirect()->route('state.index');
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
    public function destroy(State $state)
    {
        $state->delete();

        if($state){
            Session::flash('success','Successfully Delete');
            return redirect()->route('state.index');
        }else{
            Session::flash('error','Opps!! Failed');
            return back();
        }
    }
}
