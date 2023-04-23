<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    protected $fillable = [
        'accessary_id',
        'import',
        'export',
        'note'
    ];
    public function Accessary()
    {
        return $this->belongsTo(Accessary::class,'accessary_id');
    }
}