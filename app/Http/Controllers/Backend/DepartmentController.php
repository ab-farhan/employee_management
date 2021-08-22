<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $department=Department::all();
        if($request->has('search')){
            $department=Department::where('name','like','%'.$request->search.'%')->get();
        }
        return view('department.index',compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
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
            'name'=>['required']
        ]);

        $create=Department::create([
            'name'=>$request['name'],
        ]);

        if($create){
            Session::flash('success','Successfully Register a Department');
            return redirect()->route('department.index');
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
    public function edit(Department $department)
    {
        return view('department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name'=>['required']
        ]);

        $department->update([
            'name'=>$request['name'],
        ]);

        if($department){
            Session::flash('success','Successfully Update a Department');
            return redirect()->route('department.index');
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
    public function destroy(Department $department)
    {
        $department->delete();

        if($department){
            Session::flash('success','Successfully Delete');
            return redirect()->route('department.index');
        }else{
            Session::flash('error','Opps!! Failed');
            return back();
        }
    }
}
