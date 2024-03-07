@extends('admin.layouts.master')

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Edit Produk Non Grosir</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Form Upload Produk Non Grosir Baru</h4>
                            <p class="card-title-desc">Perhatikan penulisan setiap produk agar dapat membuat konsumen nyaman
                                bertransaksi</p>

                            <form action="{{ route('produk_non.update', $produk->id_produknon) }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Nama Produk</label>
                                    <input
                                        class="form-control @error('nama_produk')
                                        is-invalid
                                    @enderror"
                                        name="nama_produk" type="text" placeholder="Catton Carded 30S"
                                        id="example-text-input" value="{{ $produk->nama_produk }}">
                                    @error('nama_produk')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Kategori Produk</label>
                                    <select class="form-control select2  @error('pilih_kategori') is-invalid @enderror" name="pilih_kategori">
                                        <option selected disabled value="">--- Pilih Kategori Produk ---</option>
                                        @foreach ($kategori as $data)
                                            <option value="{{ $data->id_kategori }}" {{ $produk->kategori == $data->id_kategori ? 'selected' : '' }}>{{ Str::upper($data->jenis_kategori) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pilih_kategori')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Harga Produk</label>
                                    <input id="input-currency"
                                        class="form-control input-mask text-left @error('harga_produk_non')
                                    is-invalid
                                    @enderror"
                                        name="harga_produk_non"
                                        data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'digits': 2, 'digitsOptional': false, 'prefix': 'Rp. ', 'placeholder': '0'" value="{{ $produk->harga_produk }}">
                                    @error('harga_produk_non')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Foto Produk</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="file" name="img1" class="form-control" accept="image/*"
                                                id="imgInp1">
                                            <input type="text" name="fileimg1" class="form-control"
                                                value="{{ $produk->foto_produk1 }}" hidden>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="file" name="img2" class="form-control" accept="image/*"
                                                id="imgInp2">
                                            <input type="text" name="fileimg2" class="form-control"
                                                value="{{ $produk->foto_produk2 }}" hidden>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="file" name="img3" class="form-control" accept="image/*"
                                                id="imgInp3">
                                            <input type="text" name="fileimg3" class="form-control"
                                                value="{{ $produk->foto_produk3 }}" hidden>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="file" name="img4" class="form-control" accept="image/*"
                                                id="imgInp4">
                                            <input type="text" name="fileimg4" class="form-control"
                                                value="{{ $produk->foto_produk4 }}" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img id="output1"
                                                @if ($produk->foto_produk1 == null) src="/morvin/dist/assets/images/upload.png"
                                            @else
                                            src="/produk/{{ $produk->foto_produk1 }}" @endif
                                                width="150px" height="110px" />
                                        </div>
                                        <div class="col-md-3">
                                            <img id="output2"
                                                @if ($produk->foto_produk2 == null) src="/morvin/dist/assets/images/upload.png"
                                            @else
                                            src="/produk/{{ $produk->foto_produk2 }}" @endif
                                                width="150px" height="110px" />
                                        </div>
                                        <div class="col-md-3">
                                            <img id="output3"
                                                @if ($produk->foto_produk3 == null) src="/morvin/dist/assets/images/upload.png"
                                            @else
                                            src="/produk/{{ $produk->foto_produk3 }}" @endif
                                                width="150px" height="110px" />
                                        </div>
                                        <div class="col-md-3">
                                            <img id="output4"
                                                @if ($produk->foto_produk4 == null) src="/morvin/dist/assets/images/upload.png"
                                            @else
                                            src="/produk/{{ $produk->foto_produk4 }}" @endif
                                                width="150px" height="110px" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Deskripsi Produk</label>
                                    <textarea class="@error('deskripsi_produk')is-invalid @enderror" id="elm1" name="deskripsi_produk">{{ $produk->deskripsi }}</textarea>
                                    @error('deskripsi_produk')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success w-100"><i class="mdi mdi-content-save"></i> Simpan Produk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
@endsection

@section('css')
    <link href="/morvin/dist/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/morvin/dist/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="/morvin/dist/assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
    <link href="/morvin/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="/morvin/dist/assets/libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script>
        imgInp1.onchange = evt => {
            const [file] = imgInp1.files
            if (file) {
                output1.src = URL.createObjectURL(file)
            }
        }

        imgInp2.onchange = evt => {
            const [file] = imgInp2.files
            if (file) {
                output2.src = URL.createObjectURL(file)
            }
        }

        imgInp3.onchange = evt => {
            const [file] = imgInp3.files
            if (file) {
                output3.src = URL.createObjectURL(file)
            }
        }
        imgInp4.onchange = evt => {
            const [file] = imgInp4.files
            if (file) {
                output4.src = URL.createObjectURL(file)
            }
        }
    </script>
    <script src="/morvin/dist/assets/libs/select2/js/select2.min.js"></script>
    <script src="/morvin/dist/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="/morvin/dist/assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
    <script src="/morvin/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="/morvin/dist/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

    <script src="/morvin/dist/assets/libs/inputmask/jquery.inputmask.min.js"></script>

    <script src="/morvin/dist/assets/libs/tinymce/tinymce.min.js"></script>

    <!-- Summernote js -->
    <script src="/morvin/dist/assets/libs/summernote/summernote-bs4.min.js"></script>

    <!-- init js -->
    <script src="/morvin/dist/assets/js/pages/form-editor.init.js"></script>

    <!-- form mask init -->
    <script src="/morvin/dist/assets/js/pages/form-mask.init.js"></script>

    <script src="/morvin/dist/assets/js/pages/form-advanced.init.js"></script>
@endsection
