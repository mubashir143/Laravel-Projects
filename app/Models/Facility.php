<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    public function grounds()
{
    return $this->belongsToMany(Ground::class);
}

}
