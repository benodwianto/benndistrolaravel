@extends('admin.layouts.master')

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Sablon Produk</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="container-fluid">
        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Perbaharui Sablon</h4>
                            <p class="card-title-desc"><code>Perhatikan Tulisan Dengan Baik dan Benar</code></p>
                            <form action="{{ Route ('sablon.update', $update->id_sablon) }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <input
                                        class="form-control @error('sablon')
                                        is-invalid
                                    @enderror"
                                        name="sablon" value="{{ $update->jenis_sablon }}" type="text" placeholder="Masukan Tipe sablon"
                                        id="example-text-input">
                                    @error('sablon')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input id="input-currency"
                                        class="form-control input-mask text-left @error('harga_sablon')
                                    is-invalid
                                    @enderror"
                                        name="harga_sablon" value="{{ $update->harga_sablon }}"
                                        data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'">
                                    @error('harga_sablon')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit"
                                    class="btn btn-success waves-effect waves-light w-100">Perbaharui Data</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Data Sablon</h4>
                            <p class="card-title-desc">Data Sablon Produk - Produk yang di Pasarkan</p>

                            <div class="table-responsive">
                                <table class="table table-bordered border-danger mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nama Aplikasi Sablon</th>
                                            <th>Harga Sablon</th>
                                            <th>
                                                <center>Action</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        function rupiah($angka)
                                        {
                                            $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
                                            return $hasil_rupiah;
                                        }
                                        @endphp
                                        @foreach ($sablon as $data => $list)
                                            <tr>
                                                <td>{{ $list->jenis_sablon }}</td>
                                                <td>
                                                    @php
                                                        echo rupiah($list->harga_sablon)
                                                    @endphp

                                                    {{-- {{ echo rupiah($list->harga_sablon) }}</td> --}}
                                                <td align="center">
                                                    <form action="{{ route('sablon.destroy', $list->id_sablon) }}" method="POST"
                                                        style="display:inline"
                                                        onsubmit="return confirm('Apakah Yakin akan Di Hapus ?');">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-danger waves-effect waves-light"><i
                                                                class="dripicons-trash"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
@endsection

@section('js')
    <!-- form mask -->
    <script src="/morvin/dist/assets/libs/inputmask/jquery.inputmask.min.js"></script>

    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>

    <!-- form mask init -->
    <script src="/morvin/dist/assets/js/pages/form-mask.init.js"></script>
@endsection
