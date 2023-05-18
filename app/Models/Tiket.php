<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'tiket';

    protected $fillable = [
        'tiket_code',
        'maskapai',
        'start_city',
        'city_destination',
        'harga',
        'transit',
        'total_penumpang',
        'waktu_penerbangan',
        'jam_penerbangan',
        'class',
    ];

    function getKeyType()
    {
        return 'string';
    }

    function getIncrementing()
    {
        return false;
    }
}
