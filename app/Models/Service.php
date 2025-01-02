<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    //
    use HasFactory;
    
    protected $fillable = [
        'service_name',
        'service_description',
        'service_image',
        'service_price',
    ];

    public function cleaner()
{
    return $this->belongsTo(User::class, 'cleaner_id');
}

}
