<?php

namespace App\Models;

use Illuminate\Support\Number;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;


    //here is example of mutator

    public function setEmailAttribute($value){
        $this->attributes['email'] = strtolower($value);
    }

    public function setUserNameAttribute($value){
        $this->attributes['user_name'] = strtolower($value);
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

// HERE IS HE EXAMLE OF ACCESSOR METHOD

public function getDobAttribute($value){
    return date('D M Y', strtotime($value));
}

public function getUserNameAttribute($value){
    return ucwords($value);
}

public function getSalaryAttribute($value){
    return Number::currency($value, in:'PKR');
}

}
