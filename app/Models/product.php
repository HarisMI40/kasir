<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class product extends Model
{
    use Uuids;
    use HasFactory;

    protected $fillable = ['kode_barang','nama_product', 'qty', 'harga'];

}
