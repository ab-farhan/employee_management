<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $city=City::all();
        if($request->has('search')){
            $city=City::where('name','like','%'.$request->search.'%')->get();
        }
        return view('city.index',compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state=State::all();
        return view('city.create',compact('state'));
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
            'name' => ['required', 'string', 'max:20','unique:cities'],
            'state_id' => ['required','integer'],
        ],[
            'state_id.integer' =>'This state field is required',
        ]);

        $create=City::create([
            'state_id' => $request['state_id'],
            'name' => $request['name'],
            
        ]);

        if($create){
            Session::flash('success','Successfully Register a City');
            return redirect()->route('city.index');
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
    public function edit(City $city)
    {
        $state=State::all();
        return view('city.edit',compact('city','state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'state_id' => ['required','integer'],
        ],[
            'state_id.integer' =>'This state field is required',
        ]);

        $city->update([
            'state_id' => $request['state_id'],
            'name' => $request['name'],
            
        ]);

        if($city){
            Session::flash('success','Successfully Update a City');
            return redirect()->route('city.index');
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
    public function destroy(City $city)
    {
        $city->delete();

        if($city){
            Session::flash('success','Successfully Delete');
            return redirect()->route('city.index');
        }else{
            Session::flash('error','Opps!! Failed');
            return back();
        }
    }
}
