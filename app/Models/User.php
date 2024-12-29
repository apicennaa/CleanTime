<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    // Relasi ke Orders (User memiliki banyak Order)
    public function orders()
    {
        return $this->hasMany(Orders::class, 'user_id');
    }

    // Relasi ke Cleaners (User dapat memiliki satu Cleaner profil)
    public function cleaner()
    {
        return $this->hasOne(Cleaners::class, 'user_id');
    }
}
