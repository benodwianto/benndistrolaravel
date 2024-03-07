@extends('admin.layouts.master')

@section('content')
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Laporan Penjualan</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php
        function rupiah($angka)
        {
            $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
            return $hasil_rupiah;
        }
    @endphp
    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Laporan Penjualan</h4>
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No Pesanan</th>
                                <th>Nama Produk</th>
                                <th>Quantity</th>
                                {{-- <th>Variasi</th>
                                <th>Sablon</th> --}}
                                <th>Ongkir</th>
                                <th>Total</th>
                                <th>Tanggal Transaksi</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($laporan as $laporan)
                                <tr>
                                    <td>#P00{{ $laporan->id_pesanan }}</td>
                                    <td><b>{{ Str::title($laporan->nama_produk) }}</b></td>
                                    <td>{{ $laporan->quantity }} Pcs</td>
                                    {{-- <td><b>{{ Str::title($laporan->variasi) }}</b></td>
                                    <td><b>{{ Str::title($laporan->sablon) }}</b></td> --}}
                                    <td>
                                        @php
                                            echo rupiah($laporan->ongkir).' [ '. $laporan->nama_kota.' / '.$laporan->nama_prov.' ] '
                                        @endphp
                                    </td>
                                    <td>
                                        @php
                                            echo rupiah($laporan->total_bayar)
                                        @endphp
                                    </td>
                                    <td>{{ $laporan->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="/morvin/dist/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/morvin/dist/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="/morvin/dist/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
@endsection

@section('js')
    <script src="/morvin/dist/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/morvin/dist/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="/morvin/dist/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/morvin/dist/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="/morvin/dist/assets/libs/jszip/jszip.min.js"></script>
    <script src="/morvin/dist/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="/morvin/dist/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="/morvin/dist/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/morvin/dist/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/morvin/dist/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="/morvin/dist/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/morvin/dist/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="/morvin/dist/assets/js/pages/datatables.init.js"></script>
@endsection
