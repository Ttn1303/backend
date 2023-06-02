<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $fillable = [
        'customer_id',
        'vehicle_infor_id',
        'code',
        'state',
        'user_id',
        'receipt_date',
        'appointmentdate',
        'total',
        'note',
        'service',
        'vehicleCondition',
        'customerRequest',
        'created_at',
        'updated_at',
    ];
    public function Customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function VehicleInfor()
    {
        return $this->belongsTo(VehicleInfor::class,'vehicle_infor_id');
    }
    public function repair_detail()
    {
        return $this->hasOne(RepairDetail::class,'repair_id');
    }
}
