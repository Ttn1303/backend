<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'user_id',
        'receipt_name',
        'receipt_date',
        'total',
        'note'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function ReceiptDetails()
    {
        return $this->hasMany(ReceiptDetail::class, 'receipt_id');
    }
}