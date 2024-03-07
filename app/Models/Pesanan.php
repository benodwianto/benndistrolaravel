<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table='pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $fillable=['id_user','id_produk','quantity','id_alamat','id_kota','ongkir','bayar',
    'total_bayar','bukti_bayar','no_resi','desain','request_user','status',
    'variasi','variasi_harga','variasi_total','sablon','sablon_harga',
    'sablon_total','note_sablon_variasi','total_dp','bukti_bayar_dp',
    'bukti_bayar_dp_lunas','dp_status','tipe_pembayaran'];
}
