<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Cleaners extends Model
{
    use HasFactory;

    /**
     * Tabel yang terkait dengan model ini.
     */
    protected $table = 'cleaners';

    /**
     * Field yang dapat diisi secara massal.
     */
    protected $fillable = [
        'user_id',
        'status',
        'experience',
    ];

}