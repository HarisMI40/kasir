<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;

    protected $fillable = ['total_qty', 'total_harga'];

    function DetailPenjualan(){
    	return $this->hasMany(DetailPenjualan::class, 'id_penjualan');
    }
}
