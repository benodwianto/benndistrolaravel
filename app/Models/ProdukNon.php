<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukNon extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_produknon';
    protected $table = 'produknon';
    protected $fillable = ['nama_produk','kategori','deskripsi','harga_produk','foto_produk1',
    'foto_produk2','foto_produk3','foto_produk4'];
}
