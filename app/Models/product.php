<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\produkFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;


class product extends Model
{
    use HasFactory;
    use Uuids;
    use SoftDeletes;

    // protected $fillable = ['kode_barang','nama_product', 'qty', 'harga'];

    protected $fillable = [
        'kode_barang','nama_product', 'qty', 'harga'
    ];

}
