@extends('customer.layouts.master')

@section('content')
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Produk Grosir</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Our Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-3 rounded mt-4">
                                <h5 class="font-size-16">Kategori Produk</h5>


                                <div id="accordion" class="custom-accordion categories-accordion">
                                    <div class="categories-group-card">
                                        <a href="#collapseTwo" class="categories-group-list" data-bs-toggle="collapse"
                                            aria-expanded="true" aria-controls="collapseTwo">
                                            <i class="ti-archive font-size-16 align-middle me-2"></i> Kategori
                                            <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                        </a>
                                        <div id="collapseTwo" class="collapse show" data-parent="#accordion">
                                            <div>
                                                <ul class="list-unstyled categories-list mb-0">
                                                    <li class=""><a href="{{ route('customer.produk') }}"><i class="mdi mdi-circle-medium me-1"></i>
                                                        LIHAT SEMUA
                                                    </a>
                                                    </li>
                                                    @forelse ($kategori as $kategori)
                                                        <li class="{{ $kategori->id_kategori == $id ? 'active' : '' }}"><a href="{{ route('customer.kategori_produk', $kategori->id_kategori) }}"><i class="mdi mdi-circle-medium me-1"></i>
                                                                {{ Str::upper($kategori->jenis_kategori) }}
                                                            </a>
                                                        </li>
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-9">
                    <div class="row">
                        @php
                            function rupiah($angka)
                            {
                                $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
                                return $hasil_rupiah;
                            }
                        @endphp
                        @forelse ($produk as $produks)
                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="product-img">
                                            <img src="/produk/{{ $produks->foto_produk1 }}" alt=""
                                                class="img-fluid mx-auto d-block">
                                        </div>

                                        <div class="text-center mt-2">

                                            <a href="{{ route('customer.detail_produk', $produks->id_produk) }}" class="text-dark">
                                                <h5 class="font-size-18">{{ Str::title($produks->nama_produk) }}</h5>
                                            </a>

                                            <h5 class="mt-3 mb-0">
                                                @php
                                                    echo rupiah($produks->harga_produk1);
                                                @endphp</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        <div class="col-xl-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="alert alert-danger mb-0" role="alert">
                                        Maaf Produk Tidak Di Temukan... Anda Dapat Menghubungi Admin
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div>
                                                <p class="mb-sm-0 mt-2"><span class="font-weight-bold"></span>
                                                    <span class="font-weight-bold"></span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="float-sm-end">
                                                <ul class="pagination pagination-rounded mb-sm-0">
                                                    {{ $produk->links('pagination::bootstrap-4') }}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>


                </div>


            </div>
        </div>
    </div>
@endsection
