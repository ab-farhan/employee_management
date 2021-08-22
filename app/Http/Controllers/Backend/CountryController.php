<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $country=Country::all();
        if($request->has('search')){
            $query=$request->search;
            $country=Country::where('name','like','%'.$query.'%')->orWhere('country_code','like','%'.$query.'%')->get();
        }
        return view('countries.index',compact('country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20','unique:countries'],
            'country_code' => ['required', 'max:10'],
        ]);

        $create=Country::create([
            'country_code' => $request['country_code'],
            'name' => $request['name'],
        ]);

        if($create){
            Session::flash('success','Successfully Register a Country');
            return redirect()->route('country.index');
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
    public function edit(Country $country)
    {
        return view('countries.edit',compact('country'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $id=$country->id;

        $request->validate([
            'name' => ['required', 'string', 'max:20','unique:countries,name,'.$id.',id'],
            'country_code' => ['required', 'max:10'],
        ]);
        
       $country->update([
            'country_code' => $request['country_code'],
            'name' => $request['name'],
        ]);

        if($country){
            Session::flash('success','Successfully Update a Country');
            return redirect()->route('country.index');
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
    public function destroy(Country $country)
    {
        $country->delete();

        if($country){
            Session::flash('success','Successfully Delete');
            return redirect()->route('country.index');
        }else{
            Session::flash('error','Opps!! Failed');
            return back();
        }
    }
}
