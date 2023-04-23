<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'address',
        'age',
        'sex'
    ];
    public function Repairs()
    {
        return $this->hasMany(Repair::class, 'customer_id');
    }
}
