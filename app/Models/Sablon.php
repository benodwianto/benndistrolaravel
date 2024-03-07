<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sablon extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_sablon';
    protected $table='sablon';
    protected $fillable = ['jenis_sablon','harga_sablon'];

}
