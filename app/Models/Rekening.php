<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_rekening';
    protected $table='rekening';
    protected $fillable = ['nama_rek', 'no_rek'];
}
