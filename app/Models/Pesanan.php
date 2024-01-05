<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'id_menu',
        'id_pelanggan',
        'id_user',
        'jumlah'
    ];

    protected $hidden = [];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id');
    }
}
