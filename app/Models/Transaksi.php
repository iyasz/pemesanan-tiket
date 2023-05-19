<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'transaksi';

    protected $fillable = [
        'invoice_code',
        'user_id',
        'payment_method',
        'total_harga',
        'bayar',
        'kembali',
    ];

    function getKeyType()
    {
        return 'string';
    }

    function getIncrementing()
    {
        return false;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detail()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
