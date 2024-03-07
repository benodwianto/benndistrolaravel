@extends('admin.layouts.master')

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Rekening</h4>
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
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <h4 class="header-title">Edit Rekening</h4>
                            <p class="card-title-desc"><code>Perhatikan Tulisan Dengan Baik dan Benar</code></p>
                            <form action="{{ Route('rekening.update', $edit_rek->id_rekening) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <input
                                        class="form-control @error('jenis_rekening')
                                        is-invalid
                                    @enderror"
                                        name="jenis_rekening" type="text" placeholder="Masukan Jenis Rekening / BCA, BNI"
                                        id="example-text-input" value="{{ $edit_rek->nama_rek }}">
                                    @error('jenis_rekening')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input
                                        class="form-control @error('no_rekening')
                                        is-invalid
                                    @enderror"
                                        name="no_rekening" type="number" placeholder="Masukan Nomor Rekening"
                                        id="example-text-input" value="{{ $edit_rek->no_rek }}">
                                    @error('no_rekening')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit"
                                    class="btn btn-success waves-effect waves-light w-100">Simpan Rekening</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            @if (session('delete'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('delete') }}
                                </div>
                            @endif
                            <h4 class="header-title">Data Rekening</h4>
                            <p class="card-title-desc">Data Rekening Pembayaran Produk</p>

                            <div class="table-responsive">
                                <table class="table table-bordered border-primary mb-0">
                                    <thead>
                                        <tr>
                                            <th>Jenis Rekening</th>
                                            <th>Nomor Rekening</th>
                                            <th>
                                                <center>Action</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rekening as $data => $hasil)
                                            <tr>
                                                <td><b>{{ Str::upper($hasil->nama_rek) }}</b></td>
                                                <td><i>{{ $hasil->no_rek }}</i></td>
                                                <td align="center">
                                                    <a href="{{ route('rekening.edit', $hasil->id_rekening) }}"
                                                        class="btn btn-warning waves-effect waves-light"><i
                                                            class="dripicons-pencil"></i> Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-felx justify-content-center mt-2">
                                {{ $rekening->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
@endsection

@section('js')
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>
@endsection
