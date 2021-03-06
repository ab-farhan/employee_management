<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\State;
use Illuminate\Http\Request;

class EmplyeeDataController extends Controller
{
    public function countries(){

        $countries= Country::all();
        return response()->json($countries);
    }

    public function states(Country $country){
        return response()->json($country->state);
    }  

    public function city(State $state){

        return response()->json($state->city);
    } 
      
    public function departments(){
        $departments=Department::all();
        return response()->json($departments);
    }
}
