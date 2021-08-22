<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'country_code'
    ];

    public function state(){
        return $this->hasMany(State::class);
    }
}
