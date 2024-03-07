<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_user_alamat';
    protected $table='user_alamat';
    protected $fillable = ['id_user','no_telp','nama_penerima','id_provinsi','nama_prov','id_kota','nama_kota','kode_pos','alamat'];
}
