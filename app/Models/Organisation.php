<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'ogrn', 'oktmo',
    ];

    protected $casts = [
        'name' => 'string',
        'ogrn' => 'string',
        'oktmo' => 'string'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
