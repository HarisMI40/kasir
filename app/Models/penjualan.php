<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;

    public function getIncrementing()
    {
        return false;
    }

    
    protected $fillable = ['id', 'total_qty', 'total_harga', 'done'];

    function DetailPenjualan(){
    	return $this->hasMany(DetailPenjualan::class, 'id_penjualan');
    }
}
