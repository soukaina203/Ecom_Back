<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'userName',
        'firstName', 'lastName', 'email', 'password',
        'address_id', 'phoneNbr',     'statut'
    ];
}
