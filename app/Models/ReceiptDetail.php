<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiptDetail extends Model
{
    public $table = 'receipt_detail';
    protected $fillable = [
        'receipt_id',
        'accessary_id',
        'quantity',
        'import_price'
    ];
    public function Accessary()
    {
        return $this->belongsTo(Accessary::class,'accessary_id');
    }
    public function Receipt()
    {
        return $this->belongsTo(Receipt::class,'receipt_id');
    }
}