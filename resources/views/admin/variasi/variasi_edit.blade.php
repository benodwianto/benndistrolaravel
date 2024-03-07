@extends('admin.layouts.master')

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Variasi Produk</h4>
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
                            <h4 class="header-title">Perbaharui Variasi</h4>
                            <p class="card-title-desc"><code>Perhatikan Tulisan Dengan Baik dan Benar</code></p>
                            <form action="{{ Route ('variasi.update', $update->id_variasi) }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <input
                                        class="form-control @error('variasi')
                                        is-invalid
                                    @enderror"
                                        name="variasi" value="{{ $update->jenis_variasi }}" type="text" placeholder="Masukan Tipe Variasi"
                                        id="example-text-input">
                                    @error('variasi')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input id="input-currency"
                                        class="form-control input-mask text-left @error('harga_variasi')
                                    is-invalid
                                    @enderror"
                                        name="harga_variasi" value="{{ $update->harga_variasi }}"
                                        data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'">
                                    @error('harga_variasi')
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
                            <h4 class="header-title">Data Variasi</h4>
                            <p class="card-title-desc">Data Variasi Produk - Produk yang di Pasarkan</p>

                            <div class="table-responsive">
                                <table class="table table-bordered border-danger mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nama Variasi</th>
                                            <th>Harga Variasi</th>
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
                                        @foreach ($variasi as $data => $list)
                                            <tr>
                                                <td>{{ $list->jenis_variasi }}</td>
                                                <td>
                                                    @php
                                                        echo rupiah($list->harga_variasi)
                                                    @endphp

                                                    {{-- {{ echo rupiah($list->harga_variasi) }}</td> --}}
                                                <td align="center">
                                                    <form action="{{ route('variasi.destroy', $list->id_variasi) }}" method="POST"
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
