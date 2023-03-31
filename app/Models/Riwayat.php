<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $fillable = [
        'pengirim',
        'jumlah',
        'penerima',
        'saldo',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    protected function jumlah(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value, 0, '', '.'),
        );
    }
    protected function saldo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value, 0, '', '.'),
        );
    }
}
