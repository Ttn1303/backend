<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Accessary;

class AccessaryGroup extends Model
{
    protected $fillable = [
        'name'
    ];
    public function Accessaries()
    {
        return $this->hasMany(Accessary::class, 'accessary_group_id');
    }
}
