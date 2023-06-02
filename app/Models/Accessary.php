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
    public function ReceiptDetail()
    {
        return $this->hasMany(RepairDetail::class,'accessary_id');
    }
    public function repair_detail()
    {
        return $this->belongsToMany(RepairDetail::class, 'accessary_id');
    }
}
