@extends('admin.layouts.master')

@section('content')
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>My Profile</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">My Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <center>
                                    @if (Auth::user()->foto_profile == null)
                                        <img class="rounded-circle avatar-xl" alt="200x200" src="/annprint/default.jpg"
                                            data-holder-rendered="true">
                                    @else
                                        <img class="rounded-circle avatar-xl" alt="200x200"
                                            src="/foto_profile/{{ Auth::user()->foto_profile }}"
                                            data-holder-rendered="true">
                                    @endif

                                </center>
                            </div>
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#myModal">Ganti
                                Foto Profile</button>
                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.profile_store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('post')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">Masukan Foto :</label>
                                                        <input type="file" name="img1" class="form-control"
                                                            accept="image/*" id="imgInp1">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img id="output1" src="/morvin/dist/assets/images/upload.png"
                                                            width="150px" height="110px" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Ubah
                                                    Foto Profile</button>
                                            </div>
                                        </form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <form action="{{ route('admin.profile_update', Auth::user()->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">Nama Lengkap</label>
                                            <input
                                                class="form-control @error('nama')
                                        is-invalid
                                    @enderror"
                                                name="nama" type="text" placeholder="Nama Lengkap"
                                                id="example-text-input" value="{{ Str::title(Auth::user()->nama) }}" disabled>
                                            @error('nama')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">Email Pengguna</label>
                                            <input
                                                class="form-control @error('email')
                                        is-invalid
                                    @enderror"
                                                name="email" type="email" placeholder="Email Pengguna"
                                                id="example-text-input" value="{{ Str::title(Auth::user()->email) }}" disabled>
                                            @error('email')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">Password Pengguna /<span
                                                    class="text-danger">* Kosongkan Kalau Tidak Merubah
                                                    Password</span></label>
                                            <input class="form-control" name="password" type="password"
                                                placeholder="Password Pengguna" id="example-text-input" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary w-100">Perbaharui Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
        imgInp1.onchange = evt => {
            const [file] = imgInp1.files
            if (file) {
                output1.src = URL.createObjectURL(file)
            }
        }

        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>
@endsection
