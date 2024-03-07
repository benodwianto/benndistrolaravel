<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_produk';
    protected $table = 'produk';
    protected $fillable = ['nama_produk','kategori','deskripsi','harga_produk1',
    'harga_produk2','harga_produk3','harga_produk4','harga_produk5','foto_produk1',
    'foto_produk2','foto_produk3','foto_produk4'];
}
