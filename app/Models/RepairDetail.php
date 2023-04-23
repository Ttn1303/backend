<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepairDetail extends Model
{
    protected $table = 'repair_detail';
    protected $fillable = [
        'repair_id',
        'accessary_id',
        'quantity'
    ];
}