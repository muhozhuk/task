<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'middle_name', 'inn', 'snils', 'organisation_id', 'birth_day'
    ];

    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'middle_name' => 'string',
        'birth_day' => 'birth_day',
        'inn' => 'string',
        'snils' => 'string',
        'organisation_id' => 'integer',
    ];
}
