@extends('customer.layouts.master')

@section('content')
    @php
        function rupiah($angka)
        {
            $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
            return $hasil_rupiah;
        }
        function rupiah2($angka2)
        {
            $hasil_rupiah2 = 'Rp ' . number_format($angka2, 2, ',', '.');
            return $hasil_rupiah2;
        }
        function rupiah3($angka3)
        {
            $hasil_rupiah3 = 'Rp ' . number_format($angka3, 2, ',', '.');
            return $hasil_rupiah3;
        }
        function rupiah4($angka4)
        {
            $hasil_rupiah4 = 'Rp ' . number_format($angka4, 2, ',', '.');
            return $hasil_rupiah4;
        }
        function rupiah5($angka5)
        {
            $hasil_rupiah5 = 'Rp ' . number_format($angka5, 2, ',', '.');
            return $hasil_rupiah5;
        }
    @endphp
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Product Details</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Product Details </li>
                        </ol>
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
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="product-detail">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                                    aria-orientation="vertical">
                                                    <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill"
                                                        href="#product-1" role="tab">
                                                        <img src="/produk/{{ $produk->foto_produk1 }}" alt=""
                                                            class="img-fluid mx-auto d-block tab-img rounded">
                                                    </a>
                                                    <a class="nav-link" id="product-2-tab" data-bs-toggle="pill"
                                                        href="#product-2" role="tab">
                                                        <img src="/produk/{{ $produk->foto_produk2 }}" alt=""
                                                            class="img-fluid mx-auto d-block tab-img rounded">
                                                    </a>
                                                    <a class="nav-link" id="product-3-tab" data-bs-toggle="pill"
                                                        href="#product-3" role="tab">
                                                        <img src="/produk/{{ $produk->foto_produk3 }}" alt=""
                                                            class="img-fluid mx-auto d-block tab-img rounded">
                                                    </a>
                                                    <a class="nav-link" id="product-4-tab" data-bs-toggle="pill"
                                                        href="#product-4" role="tab">
                                                        <img src="/produk/{{ $produk->foto_produk4 }}" alt=""
                                                            class="img-fluid mx-auto d-block tab-img rounded">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-9">
                                                <div class="tab-content" id="v-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="product-1" role="tabpanel">
                                                        <div class="product-img">
                                                            <img src="/produk/{{ $produk->foto_produk1 }}" alt=""
                                                                class="img-fluid mx-auto d-block"
                                                                data-zoom="a/produk/{{ $produk->foto_produk1 }}">
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="product-2" role="tabpanel">
                                                        <div class="product-img">
                                                            <img src="/produk/{{ $produk->foto_produk2 }}" alt=""
                                                                class="img-fluid mx-auto d-block">
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="product-3" role="tabpanel">
                                                        <div class="product-img">
                                                            <img src="/produk/{{ $produk->foto_produk3 }}" alt=""
                                                                class="img-fluid mx-auto d-block">
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="product-4" role="tabpanel">
                                                        <div class="product-img">
                                                            <img src="/produk/{{ $produk->foto_produk4 }}" alt=""
                                                                class="img-fluid mx-auto d-block">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!-- end product img -->
                                </div>
                                <div class="col-xl-7">
                                    <div class="mt-4 mt-xl-3">
                                        <a href="#" class="text-primary">{{ Str::upper($produk->jenis_kategori) }}</a>
                                        <h5 class="mt-1 mb-3">{{ Str::title($produk->nama_produk) }}</h5>
                                        <h5 class="mt-2">
                                            @php
                                                echo rupiah($produk->harga_produk1);
                                            @endphp
                                        </h5>

                                        <hr class="my-4">

                                        <div class="mt-4">
                                            <h6>List Harga</h6>

                                            <div class="mt-4">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                6-11 pcs
                                                            </th>
                                                            <th>
                                                                12-23 pcs
                                                            </th>
                                                            <th>
                                                                24-50 pcs
                                                            </th>
                                                            <th>
                                                                51-100 pcs
                                                            </th>
                                                            <th>
                                                                101-200 pcs
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                @if ($produk->harga_produk1 == null)
                                                                    {{ 'Harga Tidak Tersedia' }}
                                                                @else
                                                                    @php
                                                                        echo rupiah($produk->harga_produk1);
                                                                    @endphp
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($produk->harga_produk2 == null)
                                                                    {{ 'Harga Tidak Tersedia' }}
                                                                @else
                                                                    @php
                                                                        echo rupiah2($produk->harga_produk2);
                                                                    @endphp
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($produk->harga_produk3 == null)
                                                                    {{ 'Harga Tidak Tersedia' }}
                                                                @else
                                                                    @php
                                                                        echo rupiah3($produk->harga_produk3);
                                                                    @endphp
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($produk->harga_produk4 == null)
                                                                    {{ 'Harga Tidak Tersedia' }}
                                                                @else
                                                                    @php
                                                                        echo rupiah4($produk->harga_produk4);
                                                                    @endphp
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($produk->harga_produk5 == null)
                                                                    {{ 'Harga Tidak Tersedia' }}
                                                                @else
                                                                    @php
                                                                        echo rupiah5($produk->harga_produk5);
                                                                    @endphp
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <h6>Warna & Ukuran :</h6>

                                            <div class="mt-4">
                                                <p class="text-muted mb-2"><i
                                                        class="mdi mdi-check-bold text-success me-2"></i>Tersedia Seluruh
                                                    Warna</p>
                                                <p class="text-muted mb-2"><i
                                                        class="mdi mdi-check-bold text-success me-2"></i>Tersedia Seluruh
                                                    Ukuran Pakaian</p>
                                            </div>
                                        </div>
                                        <form action="{{ route('keranjang.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mt-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Masukan Jumlah Pembelian</label>
                                                    <input id="demo0" type="text" value="6" name="demo0"
                                                        data-bts-min="6" data-bts-max="100" data-bts-init-val=""
                                                        data-bts-step="1" data-bts-decimal="0"
                                                        data-bts-step-interval="100"
                                                        data-bts-force-step-divisibility="round"
                                                        data-bts-step-interval-delay="500" data-bts-prefix=""
                                                        data-bts-postfix="" data-bts-prefix-extra-class=""
                                                        data-bts-postfix-extra-class="" data-bts-booster="true"
                                                        data-bts-boostat="10" data-bts-max-boosted-step="false"
                                                        data-bts-mousewheel="true"
                                                        data-bts-button-down-class="btn btn-default"
                                                        data-bts-button-up-class="btn btn-default">
                                                </div>
                                            </div>
                                            <input type="text" name="produk" id="" value="{{ $produk->id_produk }}" hidden>
                                            <div class="mt-4">
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light mt-2">
                                                    <i class="mdi mdi-cart me-2"></i> Masukan Keranjang
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Deskripsi</h4>

                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="true"
                                            aria-controls="flush-collapseOne">
                                            Deskripsi {{ Str::title($produk->nama_produk) }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            @php
                                                echo htmlspecialchars_decode($produk->deskripsi);
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-4">Reviews : </h4>
                            <div class="border p-4 rounded">
                                @forelse ($komentar as $komentar)
                                <div class="media border-bottom pb-3">
                                    <div class="media-body">
                                        <p class="text-muted mb-2">{{ $komentar->komentar_produk }}</p>
                                        <h5 class="font-size-15 mb-3">{{ Str::title($komentar->nama) }}</h5>
                                    </div>

                                    <p class="float-sm-right font-size-12">{{ $komentar->updated_at }}</p>
                                </div>
                                @empty
                                <div class="media border-bottom pb-3">
                                    <div class="media-body">
                                        <p class="text-muted mb-2">Tidak Ada Komentar</p>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
    <!-- end row -->
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
