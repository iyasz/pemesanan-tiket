<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'detail_transaksi';

    protected $fillable = [
        'transaksi_id',
        'tiket_id',
        'name',
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
