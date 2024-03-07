@extends('customer.layouts.master')

@section('content')
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Alamat Penerima</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Alamat Penerima</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="page-content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title">Form Alamat Penerima Barang</h5>
                    <p class="card-title-desc">Isi Dengan Sesuai Agar Pengiriman Tidak Terkendala</p>
                    <form action="{{ route('customer.alamat_checkout_store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" value="{{ $id }}" name="id_keranjang" hidden>
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Nama Lengkap Penerima</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="validationCustom01" name="nama" placeholder="Nama Lengkap">
                                    @error('nama')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">No. Telp</label>
                                    <input type="number" class="form-control @error('telp') is-invalid @enderror"
                                        id="validationCustom01" name="telp" placeholder="No. Telp">
                                    @error('telp')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Kode Pos</label>
                                    <input type="number" class="form-control @error('pos') is-invalid @enderror"
                                        id="validationCustom01" name="pos" placeholder="Kode POS / NO. POS">
                                    @error('pos')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Pilih Provinsi</label>
                                    <select class="form-control select2 @error('provinsi') is-invalid @enderror"
                                        name="provinsi">
                                        <option disabled selected>Pilih Provinsi</option>
                                        @foreach ($provinsi as $provinci)
                                            <option value="{{ $provinci['province_id'] . '|' . $provinci['province'] }}">
                                                {{ $provinci['province'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('provinsi')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Pilih Provinsi / Kabupaten</label>
                                    <select class="form-control select2 @error('kota') is-invalid @enderror" name="kota">
                                        <option disabled selected>Pilih Kota</option>
                                        @foreach ($city as $city)
                                            <option value="{{ $city['city_id'] . '|' . $city['city_name'] }}">
                                                {{ $city['city_name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('kota')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Tulis Lokasi Penerimaan Barang</label>
                                <div class="mb-3">
                                    <textarea name="alamat" placeholder="Jl. Jend Sudirman 2010 A / Komplek Permata 1 RT 34 RW 20"
                                        class="form-control @error('alamat') is-invalid @enderror" id="" cols="20" rows="5"></textarea>
                                    @error('alamat')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary w-100">Simpan Alamat</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="/morvin/dist/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/morvin/dist/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="/morvin/dist/assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
    <link href="/morvin/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
@endsection

@section('js')
    <script src="/morvin/dist/assets/libs/select2/js/select2.min.js"></script>
    <script src="/morvin/dist/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="/morvin/dist/assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
    <script src="/morvin/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="/morvin/dist/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>


    <script src="/morvin/dist/assets/js/pages/form-advanced.init.js"></script>
@endsection
