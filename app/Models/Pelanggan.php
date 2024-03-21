<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    protected $fillable = [
        'nama_pelanggan',
        'jenis_kelamin',
        'no_hp',
        'alamat',
        'status',
        'id_meja'
    ];

    protected $hidden = [];

    public function meja()
    {
        return $this->belongsTo(Meja::class, 'id_meja', 'id');
    }
}
