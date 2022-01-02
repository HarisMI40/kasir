<?php

namespace App\Helpers;
 
class angka {
    public static function titikPemisah($angka) {
       return number_format($angka,2,",",".");
    }
}