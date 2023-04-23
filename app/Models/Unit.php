<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'name'
    ];

    public function Accessaries()
    {
        return $this->hasMany(Accessary::class, 'unit_id');
    }
}