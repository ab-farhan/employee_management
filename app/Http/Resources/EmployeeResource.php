<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'middle_name'=> $this->middle_name,
            'last_name'  => $this->last_name,
            'address'    => $this->address,
            'department' => $this->department,
            'state'      => $this->state,
            'city'       => $this->city,
            'hired_date' => $this->date_hired,
            'zip_code'       => $this->zip_code,
            'birthdate'       => $this->birth_date,
        ];
    }
}