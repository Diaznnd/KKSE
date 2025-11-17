<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'nama',
        'nim_nip',
        'department',
        'tingkat',
        'keperluan',
        'photo',
    ];
}
