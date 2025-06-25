<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ground extends Model
{
     

public function vendor()
{
    return $this->belongsTo(Vendor::class);
}

public function categories()
{
    return $this->belongsToMany(Category::class);
}

public function facilities()
{
    return $this->belongsToMany(Facility::class);
}






// app/Models/Ground.php

protected $fillable = [
    'name',
    'location',
    'latitude',
    'logitude',
    'ispopular',
    'isactive',
    'baseprice',
    'discounttype',
    'discountprice',
    'openat',
    'closeat',
    'vendor_id',
];

   
}
