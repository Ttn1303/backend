<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name'
    ];
    public function VehicleInfor()
    {
        return $this->hasMany(VehicleInfor::class, 'brand_id');
    }
}
