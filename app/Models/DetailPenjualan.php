<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $fillable = ['id_product', 'qty', 'sub_total'];
	 
	 function product(){
	    return $this->belongsTo(product::class, 'id_product');
	  }
}
