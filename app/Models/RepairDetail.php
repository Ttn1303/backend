<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepairDetail extends Model
{
    public $table = 'repair_detail';
    protected $fillable = [
        'repair_id',
        'accessary_id',
        'quantity'
    ];
    public function Repairs()
    {
        return $this->belongsToMany(Repair::class,'repair_id');
    }
    public function Accessaries()
    {
        return $this->hasMany(Accessary::class, 'accessary_id');
    }
}