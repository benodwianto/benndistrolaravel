@extends('admin.layouts.master')

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Kategori Produk</h4>
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
                            <h4 class="header-title">Buat Kategori Baru</h4>
                            <p class="card-title-desc"><code>Perhatikan Tulisan Dengan Baik dan Benar</code></p>
                            <form action="{{ Route('kategori.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <input
                                        class="form-control @error('kategori')
                                        is-invalid
                                    @enderror"
                                        name="kategori" type="text" placeholder="Masukan Kategori"
                                        id="example-text-input">
                                    @error('kategori')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit"
                                    class="btn btn-success waves-effect waves-light w-100">Simpan</button>
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
                            <h4 class="header-title">Data Kategori</h4>
                            <p class="card-title-desc">Data Kategori Produk - Produk yang di Pasarkan</p>

                            <div class="table-responsive">
                                <table class="table table-bordered border-primary mb-0">
                                    <thead>
                                        <tr>
                                            <th>KATEGORI</th>
                                            <th>
                                                <center>Action</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategori as $data => $hasil)
                                            <tr>
                                                <td><b>{{ Str::upper($hasil->jenis_kategori) }}</b></td>
                                                <td align="center">
                                                    <a href="{{ route('kategori.edit', $hasil->id_kategori) }}"
                                                        class="btn btn-warning waves-effect waves-light"><i
                                                            class="dripicons-pencil"></i> Edit</a>
                                                    <form action="{{ route('kategori.destroy', $hasil->id_kategori) }}" method="POST"
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
                            <div class="d-felx justify-content-center mt-2">
                                {{ $kategori->links('pagination::bootstrap-5') }}
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
