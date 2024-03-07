@extends('customer.layouts.master')

@section('content')
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Riwayat Pesanan</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Riwayat Pesanan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="page-content-wrapper">




            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Riwayat Pesanan</h4>
                            <p class="card-title-desc">Data Riwayat Transaksi Pesanan</p>

                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID Pesanan</th>
                                                <th data-priority="1">Nama Produk</th>
                                                <th data-priority="3">Status</th>
                                                <th data-priority="1">Quantity</th>
                                                <th data-priority="3">Kota / Kab Pengiriman</th>
                                                <th data-priority="3">Tanggal Sampai</th>
                                                <th data-priority="3">Invoice</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($riwayat as $riwayat)
                                            <tr>
                                                <td>#P00{{ $riwayat->id_pesanan }}</td>
                                                <td>{{ Str::title($riwayat->nama_produk) }}</td>
                                                <td><span class="badge bg-success">{{ Str::upper($riwayat->status) }}</span></td>
                                                <td>{{ $riwayat->quantity }} Pcs</td>
                                                <td>{{ $riwayat->nama_kota.' [ '.$riwayat->nama_prov.' ] ' }}</td>
                                                <td>{{ $riwayat->updated_at }}</td>
                                                <td><a href="{{ route('pesanan.show', $riwayat->id_pesanan) }}"
                                                    class="btn btn-success btn-sm"><i
                                                        class="mdi mdi-note-outline"></i> Cetak</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div>


    </div>
@endsection

@section('css')
    <link href="/morvin/dist/assets/libs/admin-resources/rwd-table/rwd-table.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script src="/morvin/dist/assets/libs/admin-resources/rwd-table/rwd-table.min.js"></script>

    <!-- Init js -->
    <script src="/morvin/dist/assets/js/pages/table-responsive.init.js"></script>
@endsection
