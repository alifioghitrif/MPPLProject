<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wargadesa extends Model
{
    use HasFactory;
    protected $fillable = [
        'NIK' ,
        'Nama',
        'Nomor_KK',
        'Jenis_Kelamin',
        'Status_Perkawinan',
        'Tanggal_Lahir',
        'Pekerjaan',
        'Status_Dalam_Keluarga',
        'Nomor_Telepon',
        'dusun_id'
    ];
}

