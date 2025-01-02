<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cleaner extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cleaner_name',
        'cleaner_nohp',
        'availability_status',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
