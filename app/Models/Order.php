<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cleaner_id',
        'service_id',
        'schedule_time',
        'status',
        'total_price',
        'full_name',
        'phone',
        'address',
        'service_date',
        'service_time',
        'note'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Cleaner (jika ada)
    public function cleaner()
    {
        return $this->belongsTo(User::class, 'cleaner_id');
    }

    // Relasi ke Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id', 'id');
    }
}
