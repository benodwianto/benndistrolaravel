@extends('customer.layouts.master')

@section('content')
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Pesanan</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">My Order</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        @php
            function rupiah($angka)
            {
                $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
                return $hasil_rupiah;
            }

            function tgl_indo($tanggal)
            {
                $bulan = [
                    1 => 'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember',
                ];
                $pecahkan = explode('-', $tanggal);

                // variabel pecahkan 0 = tanggal
                // variabel pecahkan 1 = bulan
                // variabel pecahkan 2 = tahun

                return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
            }
        @endphp
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-warning" role="alert">
                                <b>Note : </b>
                                <p>Untuk Lama Proses Pembuatan Pakaian Kurang Lebih Membutuhkan Waktu Satu Minggu (7 Hari)
                                </p>
                            </div>
                            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Menunggu Pembayaran</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Pesanan On-Going / Di Kemas</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                        <span class="d-none d-sm-block">Pesanan Dikirim</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content p-3 text-muted">
                                <div class="tab-pane active" id="home1" role="tabpanel">
                                    <p class="mb-0">
                                    <div class="table-responsive">
                                        <table class="table table-centered datatable dt-responsive nowrap "
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Nama Produk</th>
                                                    <th>Banyak Pesanan</th>
                                                    <th>Status Pembayaran</th>
                                                    <th style="width: 120px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pesanan_paid as $pesanan_paid)
                                                    <tr>
                                                        <td><a href="javascript: void(0);"
                                                                class="text-dark fw-bold">#P00{{ $pesanan_paid->id_pesanan }}</a>
                                                        </td>
                                                        <td>
                                                            {{ Str::title($pesanan_paid->nama_produk) }}
                                                        </td>
                                                        <td style="text-align: center">
                                                            {{ $pesanan_paid->quantity }} Pcs
                                                        </td>
                                                        @if ($pesanan_paid->status == 'menunggu pembayaran')
                                                            <td>
                                                                <div class="badge badge-soft-danger font-size-12">
                                                                    {{ Str::upper($pesanan_paid->status) }}</div>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('pesanan.edit', $pesanan_paid->id_pesanan) }}"
                                                                    class="btn btn-warning btn-rounded btn-sm">Bayar
                                                                    Sekarang <i class="fas fa-money-bill-alt"></i></a>
                                                            </td>
                                                        @elseif ($pesanan_paid->status == 'Bukti Pembayaraan Sedang Di Tinjau')
                                                            <td>
                                                                <div class="badge badge-soft-warning font-size-12">
                                                                    {{ Str::upper($pesanan_paid->status) }}</div>
                                                            </td>
                                                            <td>
                                                            </td>
                                                        @elseif ($pesanan_paid->status == 'Pesanan Di Tolak')
                                                            <td>
                                                                <div class="badge badge-soft-danger font-size-12">
                                                                    {{ Str::upper($pesanan_paid->status) }}</div>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('pesanan.edit', $pesanan_paid->id_pesanan) }}"
                                                                    class="btn btn-warning btn-rounded btn-sm">Upload Ulang
                                                                    Pembayaran <i class="fas fa-money-bill-alt"></i></a>
                                                            </td>
                                                        @endif

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </p>
                                </div>
                                <div class="tab-pane" id="profile1" role="tabpanel">
                                    <p class="mb-0">
                                    <div class="table-responsive">
                                        <table class="table table-centered datatable dt-responsive nowrap "
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Nama Produk</th>
                                                    <th>Banyak Pesanan</th>
                                                    <th>Status</th>
                                                    <th style="width: 120px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ongoing as $ongoing)
                                                    <tr>
                                                        <td><a href="javascript: void(0);"
                                                                class="text-dark fw-bold">#P00{{ $ongoing->id_pesanan }}</a>
                                                        </td>
                                                        <td>
                                                            {{ Str::title($ongoing->nama_produk) }}
                                                        </td>
                                                        <td style="text-align: center">
                                                            {{ $ongoing->quantity }} Pcs
                                                        </td>
                                                        <td>
                                                            @if ($ongoing->tipe_pembayaran == 'lunas')
                                                                <div class="badge badge-soft-success font-size-12">Pesanan
                                                                    Anda
                                                                    Sedang Kerjakan</div>
                                                            @endif
                                                            @if ($ongoing->dp_status == 'lunas')
                                                                <div class="badge badge-soft-success font-size-12">Pesanan
                                                                    Anda
                                                                    Sedang Kerjakan</div>
                                                            @endif
                                                            @if ($ongoing->dp_status == 'tagihan deliver')
                                                                <span class="badge bg-danger">Tagihan Sisa Pembayaran</span>
                                                            @endif
                                                            @if ($ongoing->dp_status == 'tagihan tolak')
                                                                <span class="badge bg-danger">Tagihan Sisa Pembayaran Di
                                                                    Tolak</span>
                                                            @endif
                                                            @if ($ongoing->dp_status == 'tagihan send')
                                                                <span class="badge bg-primary">Sisa Tagihan Sedang Di Cek Admin</span>
                                                            @endif
                                                            @if ($ongoing->dp_status == 'tagihan sisa tolak')
                                                                <span class="badge bg-danger">Sisa Tagihan Di Tolak Admin</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($ongoing->tipe_pembayaran == 'lunas')
                                                                <a href="{{ route('pesanan.show', $ongoing->id_pesanan) }}"
                                                                    class="btn btn-secondary"><i
                                                                        class="mdi mdi-note-outline"></i> Cetak Invoice</a>
                                                            @endif
                                                            @if ($ongoing->dp_status == 'tagihan deliver')
                                                                <button type="button"
                                                                    class="btn btn-info btn-rounded btn-sm"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target=".bs-example-modal-center-{{ $ongoing->id_pesanan }}">Bayar
                                                                    Sisa Tagihan <i
                                                                        class="fas fa-money-bill-alt"></i></button>
                                                            @endif
                                                            @if ($ongoing->dp_status == 'tagihan sisa tolak')
                                                                <button type="button"
                                                                    class="btn btn-info btn-rounded btn-sm"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target=".bs-example-modal-center-{{ $ongoing->id_pesanan }}">Bayar
                                                                    Ulang Sisa Tagihan <i
                                                                        class="fas fa-money-bill-alt"></i></button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade bs-example-modal-center-{{ $ongoing->id_pesanan }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title mt-0">Upload Sisa Tagihan</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">

                                                                    </button>
                                                                </div>
                                                                @php
                                                                    $dp = $ongoing->total_bayar * 0.5;
                                                                    // echo rupiah($dp);
                                                                @endphp
                                                                <div class="modal-body">
                                                                    <h5 class="header-title">Bukti Pembayaran
                                                                        #P00{{ $ongoing->id_pesanan }}</h5>
                                                                    <p class="card-title-desc">Bukti Pembayaran Produk</p>
                                                                    <dl class="row mb-0">
                                                                        <dt class="col-sm-4">Nama Produk</dt>
                                                                        <dd class="col-sm-8">
                                                                            {{ Str::title($ongoing->nama_produk) }}
                                                                        </dd>
                                                                        <dt class="col-sm-4">Total Pesanan</dt>
                                                                        <dd class="col-sm-8">
                                                                            {{ $ongoing->quantity }}
                                                                            Pcs
                                                                        </dd>
                                                                        <dt class="col-sm-4">Berat</dt>
                                                                        <dd class="col-sm-8">
                                                                            {{ $ongoing->quantity * 145 }} Gram</dd>
                                                                        <dt class="col-sm-4">Variasi </dt>
                                                                        <dd class="col-sm-8">{{ $ongoing->variasi }}
                                                                        </dd>
                                                                        <dt class="col-sm-4">Sablon</dt>
                                                                        <dd class="col-sm-8">{{ $ongoing->sablon }}
                                                                        </dd>
                                                                        <dt class="col-sm-4">Ongkir </dt>
                                                                        <dd class="col-sm-8">@php
                                                                            echo rupiah($ongoing->ongkir) . ' [ ' . $ongoing->nama_kota . ' ]';
                                                                        @endphp</dd>
                                                                        <dt class="col-sm-4">Total</dt>
                                                                        <dd class="col-sm-8">
                                                                            @php
                                                                                echo rupiah($ongoing->total_bayar);
                                                                            @endphp</dd>
                                                                        <dt class="col-sm-4">Tagihan Terbayar</dt>
                                                                        <dd class="col-sm-8">
                                                                            @php
                                                                                echo rupiah($dp);
                                                                            @endphp <span
                                                                                class="badge bg-success"> Lunas</span></dd>
                                                                        <dt class="col-sm-4">Sisa Tagihan</dt>
                                                                        <dd class="col-sm-8">
                                                                            @php
                                                                                echo rupiah($dp);
                                                                            @endphp</dd>
                                                                    </dl>
                                                                    <form action="{{ route('customer.pesanan_dp', $ongoing->id_pesanan) }}" method="post"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('put')
                                                                    <div class="col-md-12 mb-2">
                                                                        <input type="file" name="bukti_bayar"
                                                                            class="form-control @error('bukti_bayar') is-invalid @enderror"
                                                                            accept="image/*" id="imgInp1" required>
                                                                        @error('bukti_bayar')
                                                                            <span
                                                                                class="invalid-feedback">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-md-12 mb-3">
                                                                        <img id="output1"
                                                                            src="/morvin/dist/assets/images/upload.png"
                                                                            width="150px" height="110px" />
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-primary w-100">Kirim Bukti
                                                                        Pembayaran</button>
                                                                    </form>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </p>
                                </div>
                                <div class="tab-pane" id="messages1" role="tabpanel">
                                    <p class="mb-0">
                                    <div class="table-responsive">
                                        <table class="table table-centered datatable dt-responsive nowrap "
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Nama Produk</th>
                                                    <th>Tanggal Kirim</th>
                                                    <th>Status</th>
                                                    <th>Invoice</th>
                                                    <th style="width: 120px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($kirim as $kirim)
                                                    <tr>
                                                        <td><a href="javascript: void(0);"
                                                                class="text-dark fw-bold">#P00{{ $kirim->id_pesanan }}</a>
                                                        </td>
                                                        <td>
                                                            {{ Str::title($kirim->nama_produk) }}
                                                        </td>
                                                        <td style="text-align: center">
                                                            {{ $kirim->updated_at }} <br>
                                                            No. Resi : {{ $kirim->no_resi }}
                                                        </td>
                                                        <td>
                                                            <div class="badge badge-soft-success font-size-12">Pesanan Ada
                                                                Dalam Perjalanan</div>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('pesanan.show', $kirim->id_pesanan) }}"
                                                                class="btn btn-secondary"><i
                                                                    class="mdi mdi-note-outline"></i> Cetak</a>
                                                        </td>
                                                        <td>
                                                            <a href="" class="me-3 text-success"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#komentar-{{ $kirim->id_pesanan }}"><i
                                                                    class="mdi mdi-truck-fast font-size-18"></i> Barang
                                                                Sampai</a>
                                                        </td>
                                                    </tr>
                                                    <div id="komentar-{{ $kirim->id_pesanan }}" class="modal fade"
                                                        tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <form action="{{ route('customer.store_komentar') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <input type="text" name="id_pesanan"
                                                                            id=""
                                                                            value="{{ $kirim->id_pesanan }}" hidden>
                                                                        <input type="text" name="id_produk"
                                                                            id=""
                                                                            value="{{ $kirim->id_produk }}" hidden>
                                                                        <input type="text" name="id_user"
                                                                            id="" value="{{ Auth::user()->id }}"
                                                                            hidden>
                                                                        <div class="row">
                                                                            <div class="col-xl-12 mb-2">
                                                                                <label for="">Komentar
                                                                                    Produk</label>
                                                                                <textarea class="form-control" name="komentar" id="" cols="30" rows="10">Produk Memuaskan Sekali</textarea>
                                                                            </div>
                                                                            <div class="col-xl-12 mb-2">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary w-100">Kirim
                                                                                    Komentar</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="/morvin/dist/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="/morvin/dist/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
@endsection

@section('js')
    <script src="/morvin/dist/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/morvin/dist/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="/morvin/dist/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/morvin/dist/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="/morvin/dist/assets/js/pages/ecommerce-datatables.init.js"></script>

    <script>
        imgInp1.onchange = evt => {
            const [file] = imgInp1.files
            if (file) {
                output1.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
