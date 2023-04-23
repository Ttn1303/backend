<?php

namespace App\Models;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use App\Models\AccessaryGroup;

class Accessary extends Model
{
    // protected $guarded = [];

    protected $fillable = [
        'accessary_group_id',
        'code',
        'name',
        'unit_id',
        'price',
        'import_price',
        'quantity',
        'description'
    ];
    public function AccessaryGroup()
    {
        return $this->belongsTo(AccessaryGroup::class,'accessary_group_id');
    }
    public function Unit()
    {
        return $this->belongsTo(Unit::class,'unit_id');
    }
    public function WareHouses()
    {
        return $this->hasMany(WareHouse::class,'accessary_id');
    }
}
