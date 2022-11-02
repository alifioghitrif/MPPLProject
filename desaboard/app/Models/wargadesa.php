<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wargadesa extends Model
{
    use HasFactory;
    // private static $wargadesa = [
    //     [
    //         "nama" => "Ucup",
    //         "Tanggal_Lahir" => "2019-08-01"
    //     ]
    //     ];

    // public static function taketl()
    // {
    //     $tanggallahir = [];
    //     foreach(self::$wargadesa as $warga) {
    //         array_push($tanggallahir, $warga["Tanggal_Lahir"]);
    //     }

    //     return $tanggallahir;
    // }
    // public function scopeFilter($query, array $filters){
    //     if(isset($filters['search']) ? $filters['search'] : false){
    //         $query ->where('Nama', 'like', '%' . $filters['search'] ."%")
    //         ->orwhere('NIK', 'like', '%' . $filters['search'] ."%")
    //         ->orwhere('Nomor_KK', 'like', '%' . $filters['search'] ."%");
    //     }
    // }
}

