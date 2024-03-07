@extends('customer.layouts.master')

@section('content')
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Checkout</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Checkout</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            @error('alamat_kirim')
                                <div class="alert alert-id alert-danger" role="alert">
                                    Gagal !!! , Di Wajibkan Untuk Memilih Alamat Pengiriman
                                </div>
                            @enderror
                            @if (session('error'))
                                <div class="alert alert-id alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @elseif (session('success'))
                                <div class="alert alert-id alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <h5 class="header-title">Checkout Barang</h5>
                            <p class="card-title-desc">Informasi Data Pemesan</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label class="form-label" for="billing-name">Nama Lengkap</label>
                                        <input type="text" value="{{ Str::upper(Auth::user()->nama) }}"
                                            class="form-control" id="billing-name" readonly>
                                    </div>
                                </div><!-- end col -->
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label class="form-label" for="billing-email-address">Alamat Email</label>
                                        <input type="email" value="{{ Auth::user()->email }}" class="form-control"
                                            id="billing-name" readonly>
                                    </div>
                                </div><!-- end col -->
                            </div>
                            <h5 class="header-title">Alamat Penerima Produk</h5>
                            <p class="card-title-desc">
                                <a href="{{ route('customer.alamat_checkout', $id) }}"
                                    class="btn btn-info waves-effect waves-light"><i class="mdi mdi-home-plus"></i> Tambah
                                    Alamat
                                    Penerima</a>
                            </p>
                            <form action="{{ route('pesanan.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <input type="text" name="id_keranjang" id="" value="{{ $id }}" hidden>
                                <div class="row">
                                    @forelse ($alamat as $alamat)
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="card border rounded shipping-address">
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <input class="form-check-input float-end" type="radio"
                                                            name="alamat_kirim"
                                                            value="{{ $alamat->id_kota . '|' . $alamat->id_user_alamat }}"
                                                            id="formRadios2">Pilih Alamat
                                                    </div>
                                                    {{-- <a href="#" class="float-end ms-1">Edit</a> --}}
                                                    <h5 class="font-size-14">{{ Str::title($alamat->nama_penerima) }}</h5>
                                                    <p class="mb-1">
                                                        {{ $alamat->alamat . ', ' . $alamat->nama_kota . ' [' . $alamat->nama_prov . ']' }}
                                                    </p>
                                                    <p class="mb-0">Tlp. {{ $alamat->no_telp }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-lg-6">
                                            <div class="card alert border mt-lg-0 p-0 mb-0">
                                                <div class="card-header bg-soft-danger">
                                                    <h5 class="font-size-16 text-danger my-1">Alamat Tidak Di Temukan
                                                    </h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <div class="mb-2">
                                                            <i class="mdi mdi-alert-outline display-4 text-danger"></i>
                                                        </div>
                                                        <p>Anda Dapat Menambahkan Alamat Penerimaan Barang Pada Tombol
                                                            Di
                                                            Atas</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                                <div class="row">
                                    @if ($alamat->count() > 0)
                                        <div class="mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label">Pilih Variasi Produk / <span class="text-danger">*
                                                        Kosongkan Kalau Tidak Ada Variasi
                                                        Produk</span></label>
                                                <select class="form-control select2" id="variasiId">
                                                    <option value="">Pilih Variasi Produk [Bisa Di Pilih Lebih Dari
                                                        Satu]</option>
                                                    @foreach ($variasi as $variasi)
                                                        <option data-doj="{{ $variasi->harga_variasi }}"
                                                            data-city="{{ $variasi->jenis_variasi }}">
                                                            {{ Str::upper($variasi->jenis_variasi) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" name="variasi"
                                                    id="variasi_result" readonly>
                                                <input type="text" value="" name="variasi_harga" id="variasi_harga"
                                                    size="20" hidden>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label">Pilih Aplikasi Sablon Produk / <span
                                                        class="text-danger">*
                                                        Kosongkan Kalau Tidak Ada Aplikasi
                                                        Sablon</span></label>
                                                <select class="form-control select2" id="sablonId">
                                                    <option value="">Pilih Aplikasi Sablon [Bisa Di Pilih Lebih Dari
                                                        Satu]</option>
                                                    @foreach ($sablon as $sablon)
                                                        <option data-doj="{{ $sablon->harga_sablon }}"
                                                            data-city="{{ $sablon->jenis_sablon }}">
                                                            {{ Str::upper($sablon->jenis_sablon) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="col-md-12">
                                                <input class="form-control" type="text" name="sablon"
                                                    id="sablon_result" readonly>
                                                <input type="text" value="" name="sablon_harga" id="sablon_harga"
                                                    size="20" hidden>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label">Catatan Untuk Aplikasi Sablon dan Variasi Produk <span class="text-danger">*
                                                    Kosongkan Kalau Tidak Ada Catatan</span></label>
                                                <div>
                                                    <textarea class="form-control" name="note" rows="5" placeholder="Catatan Variasi dan Sablon Produk"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary w-100"><i
                                                    class="mdi mdi-newspaper-plus"></i> Checkout Pesanan</button>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0" style="width: 100px;" scope="col">Photo</th>
                                            <th class="border-top-0" scope="col">Product</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keranjang as $keranjang)
                                            <tr>
                                                <td><img src="/produk/{{ $keranjang->foto_produk1 }}" alt="product-img"
                                                        title="product-img" class="avatar-md"></td>
                                                <td>
                                                    <h5 class="font-size-16 text-truncate"><a href="#"
                                                            class="text-reset">{{ Str::title($keranjang->nama_produk) }}</a>
                                                    </h5>
                                                    <p class="font-size-14 mb-0 text-muted">Quantity :
                                                        {{ $keranjang->total }} Pcs</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
    </div>
@endsection

@section('js')
    <script>
        window.setTimeout(function() {
            $(".alert-id").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);

        $(document).ready(function() {

            $("#variasiId").change(function() {
                var cntrol = $(this);

                var Item = cntrol.find(':selected').data('city');

                var variasi = $('#variasi_result');
                var value = variasi.val();
                var finalvalue = value + Item + ', ';

                if (cntrol.val() == "")
                    finalvalue = "";
                $('#variasi_result').val(finalvalue);
            });

            $("#variasiId").change(function() {
                var cntrol = $(this);

                var item_harga = cntrol.find(':selected').data('doj');

                var variasi_harga = $('#variasi_harga').val();
                var finalharga = variasi_harga + item_harga + ', ';

                if (cntrol.val() == "")
                    finalharga = "";
                $('#variasi_harga').val(finalharga);
            });

            $("#sablonId").change(function() {
                var cntrol = $(this);

                var Item = cntrol.find(':selected').data('city');

                var variasi = $('#sablon_result');
                var value = variasi.val();
                var finalvalue = value + Item + ', ';

                if (cntrol.val() == "")
                    finalvalue = "";
                $('#sablon_result').val(finalvalue);
            });

            $("#sablonId").change(function() {
                var cntrol = $(this);

                var item_harga = cntrol.find(':selected').data('doj');

                var variasi_harga = $('#sablon_harga').val();
                var finalharga = variasi_harga + item_harga + ', ';

                if (cntrol.val() == "")
                    finalharga = "";
                $('#sablon_harga').val(finalharga);
            });



        });
    </script>

    <!-- twitter-bootstrap-wizard js -->
    <script src="/morvin/dist/assets/libs/select2/js/select2.min.js"></script>
    <script src="/morvin/dist/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="/morvin/dist/assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
    <script src="/morvin/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="/morvin/dist/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>


    <script src="/morvin/dist/assets/js/pages/form-advanced.init.js"></script>
@endsection

@section('css')
    <link href="/morvin/dist/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/morvin/dist/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="/morvin/dist/assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
    <link href="/morvin/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
@endsection
