<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variasi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_variasi';
    protected $table='variasi';
    protected $fillable = ['jenis_variasi','harga_variasi'];
}
