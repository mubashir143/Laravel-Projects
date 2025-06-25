<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function scopeActive($query){
        return $query->where('status', 1);
    }

    public function scopeCity($query, $cityname){
        return $query->whereIn('city', $cityname);
    }

    public function scopeSort($query){
        return $query->orderBy('name', 'asc');
    }


}
