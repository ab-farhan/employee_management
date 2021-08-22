<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmplyeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee=Employee::all();

        return EmployeeResource::collection($employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'first_name'=>['required'],
            'middle_name'=>['required'],
            'last_name'=>['required'],
            'address'=>['required'],
            'department_id'=>['required'],
            'country_id'=>['required'],
            'state_id'=>['required'],
            'city_id'=>['required'],
            'zip_code'=>['required'],
            'birth_date'=>['required'],
            'date_hired'=>['required'],
        ]);

        $create=Employee::create([
            'first_name'=>$request['first_name'],
            'middle_name'=>$request['middle_name'],
            'last_name'=>$request['last_name'],
            'address'=>$request['address'],
            'department_id'=>$request['department_id'],
            'country_id'=>$request['country_id'],
            'state_id'=>$request['state_id'],
            'city_id'=>$request['city_id'],
            'zip_code'=>$request['zip_code'],
            'birth_date'=>$request['birth_date'],
            'date_hired'=>$request['date_hired'],
        ]);

        return response()->json($create);
        
        if($create){
            return response()->json($create);
        }else{
            $res=[
                'error' =>'something Went wrong',
            ];
            return response()->json($res);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
