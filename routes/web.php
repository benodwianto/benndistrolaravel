<?php

use App\Http\Controllers\Admin\ChatAdminController;
use App\Http\Controllers\admin\LaporanPenjualanAdminController;
use App\Http\Controllers\admin\PesananAdminController;
use App\Http\Controllers\admin\ProfileAdminController;
use App\Http\Controllers\Admin\RekeningAdminController;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AplikasiSablonController;
use App\Http\Controllers\customer\AlamatCustomerController;
use App\Http\Controllers\customer\ChatCustomerController;
use App\Http\Controllers\Customer\CustomerProdukController;
use App\Http\Controllers\Customer\DashboardCustomerController;
use App\Http\Controllers\customer\KeranjangCustomerController;
use App\Http\Controllers\Customer\KomentarCustomerController;
use App\Http\Controllers\customer\PesananCustomerController;
use App\Http\Controllers\customer\PesananDPCustomerController;
use App\Http\Controllers\customer\ProfileCustomerController;
use App\Http\Controllers\customer\RiwayatPesananController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProduknonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariasiProdukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product', [HomeController::class, 'grosir'])->name('produk');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/product/detail/{produk}', [HomeController::class, 'detail_produk'])->name('detail_produk');

Route::get('/kategori/search/{kategori}', [HomeController::class, 'cari_kategori'])->name('cari_kategori');

Route::get('/product_non', [HomeController::class, 'non_grosir'])->name('produk_non');

Route::get('/product_non/detail/{produk}', [HomeController::class, 'detail_produk_non'])->name('detail_produk_non');

Route::get('/kategori_non/search/{kategori_non}', [HomeController::class, 'cari_kategori_non'])->name('cari_kategori_non');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/dashboard', [AdminDashboardController::class, 'laporan'])->name('admin.laporan');

    Route::resource('/admin/produk_non', ProduknonController::class);

    Route::resource('/admin/produk', ProdukController::class);

    Route::resource('/admin/kategori', KategoriProdukController::class);

    Route::resource('/admin/variasi', VariasiProdukController::class);

    Route::resource('/admin/sablon', AplikasiSablonController::class);

    Route::resource('/admin/sablon', AplikasiSablonController::class);

    Route::resource('/admin/rekening', RekeningAdminController::class);

    Route::get('/admin/customer', [UserController::class, 'index'])->name('customer.index');

    Route::get('/admin/pesanan', [PesananAdminController::class, 'index'])->name('pesananAdmin.index');

    Route::get('/admin/pesanan/konfirm-pesanan/{pesanan}', [PesananAdminController::class, 'konfirm_pembayaran'])->name('pesananAdmin.konfirm_pesanan');
    Route::get('/admin/pesanan/tolak-pesanan/{pesanan}', [PesananAdminController::class, 'tolak_pembayaran'])->name('pesananAdmin.tolak_pesanan');
    Route::get('/admin/pesanan/cetak-pesanan/{pesanan}', [PesananAdminController::class, 'cetak_pesanan'])->name('pesananAdmin.cetak_pesanan');
    Route::get('/admin/pesanan/download/{pesanan}', [PesananAdminController::class, 'download_request'])->name('pesananAdmin.download');
    Route::put('/admin/pesanan/resi-store/{pesanan}', [PesananAdminController::class, 'store_resi'])->name('pesananAdmin.store_resi');

    Route::get('/admin/pesanan/tagihan-dp/{pesanan}', [PesananAdminController::class, 'kirim_tagihan'])->name('pesananAdmin.kirim_tagihan');
    Route::get('/admin/pesanan/tagihan-dp/tolak/{pesanan}', [PesananAdminController::class, 'tolak_sisa_dp'])->name('pesananAdmin.tolak_tagihan_dp');
    Route::get('/admin/pesanan/tagihan-dp/terima/{pesanan}', [PesananAdminController::class, 'terima_sisa_dp'])->name('pesananAdmin.terima_tagihan_dp');

    Route::get('/admin/chat', [ChatAdminController::class, 'index'])->name('admin.chat');
    Route::get('/admin/chat/{chat}', [ChatAdminController::class, 'detail_chat'])->name('admin.chat_detail');
    Route::post('/admin/chat', [ChatAdminController::class, 'send'])->name('admin.post_chat');

    Route::get('/admin/profile', [ProfileAdminController::class, 'index'])->name('admin.profile');
    Route::post('/admin/profile/store', [ProfileAdminController::class, 'store'])->name('admin.profile_store');
    Route::put('/admin/profile/update/{profile}', [ProfileAdminController::class, 'update_profile'])->name('admin.profile_update');

    Route::get('/admin/laporan/penjualan', [LaporanPenjualanAdminController::class, 'laporan_penjualan'])->name('admin.laporan_penjualan');

});

Route::middleware(['auth', 'user-access:pembeli'])->group(function () {
    Route::get('/customer/dashboard', [DashboardCustomerController::class, 'index'])->name('customer.dashboard');

    Route::get('/customer/produk', [CustomerProdukController::class, 'index'])->name('customer.produk');
    Route::get('/customer/produk/detail/{produk}', [CustomerProdukController::class, 'detail_produk'])->name('customer.detail_produk');

    Route::get('/customer/produk/kategori/{kategori}', [CustomerProdukController::class, 'kategori_produk'])->name('customer.kategori_produk');

    Route::resource('/customer/keranjang', KeranjangCustomerController::class);

    Route::get('/customer/alamat/checkout/{alamat}', [AlamatCustomerController::class, 'create_checkout'])->name('customer.alamat_checkout');
    Route::post('/customer/alamat/checkout/store', [AlamatCustomerController::class, 'store_alamat_checkout'])->name('customer.alamat_checkout_store');

    Route::resource('/customer/pesanan', PesananCustomerController::class);
    route::put('/customer/pesanan-dp/update/{pesanan}', [PesananDPCustomerController::class, 'update_sisa'])->name('customer.pesanan_dp');

    Route::post('/customer/komentar', [KomentarCustomerController::class, 'store_komentar'])->name('customer.store_komentar');

    Route::get('/customer/riwayat', [RiwayatPesananController::class, 'index'])->name('customer.riwayat');

    Route::get('/customer/chat', [ChatCustomerController::class, 'index'])->name('customer.chat');
    Route::post('/customer/chat', [ChatCustomerController::class, 'send'])->name('customer.post_chat');

    Route::get('/customer/profile', [ProfileCustomerController::class, 'index'])->name('customer.profile');
    Route::post('/customer/profile/store', [ProfileCustomerController::class, 'store'])->name('customer.profile_store');
    Route::put('/customer/profile/update/{profile}', [ProfileCustomerController::class, 'update_profile'])->name('customer.profile_update');
});
