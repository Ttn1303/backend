<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleInfor extends Model
{
    protected $fillable=[
        'licensePlates',
        'type_vehicle',
        'yearProduct',
        'frameNumber',
        'color',
        'capacity',
        'brand_id',
        'model',
        'kmNumber'
    ];
    public function Brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function Repairs()
    {
        return $this->hasMany(Repair::class,'vehicle_infor_id');
    }
}
