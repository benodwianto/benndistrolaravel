@extends('admin.layouts.master')

@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Dashboard</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="container-fluid">
        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-xl-6">
                    <div class="row">
                        @php
                            $total_penjualan = DB::Table('pesanan')
                                ->where('status', 'Barang Dalam Pengiriman')
                                ->orWhere('status', 'selesai')
                                ->get();
                            $total_customer = DB::Table('users')
                                ->where('id', '!=', Auth::user()->id)
                                ->get();
                            $total_pendapatan = DB::Table('pesanan')
                                ->select(DB::raw('SUM(bayar) as total_pendapatan'))
                                ->where('status', 'selesai')
                                ->get();
                            $total_produk = DB::Table('pesanan')
                                ->select(DB::raw('SUM(quantity) as total_produk'))
                                ->where('status', 'selesai')
                                ->get();
                        @endphp
                        <div class="col-xl-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <p class="font-size-16">Transaksi</p>
                                        <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                            <span class="avatar-title rounded-circle bg-soft-primary">
                                                <i class="mdi mdi-cart-outline text-primary font-size-20"></i>
                                            </span>
                                        </div>
                                        <h5 class="font-size-22">{{ $total_penjualan->count() }}</h5>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col-xl-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <p class="font-size-16">Customer</p>
                                        <div class="mini-stat-icon mx-auto mb-4 mt-3">
                                            <span class="avatar-title rounded-circle bg-soft-success">
                                                <i class="mdi mdi-account-outline text-success font-size-20"></i>
                                            </span>
                                        </div>
                                        <h5 class="font-size-22">{{ $total_customer->count() }}</h5>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mt-2 text-center">
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="mt-4 mt-sm-0">
                                                    @php
                                                        function rupiah($angka)
                                                        {
                                                            $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
                                                            return $hasil_rupiah;
                                                        }
                                                    @endphp

                                                    <div id="list-chart-1" class="apex-charts" dir="ltr"></div>
                                                    <p class="text-muted mb-2 mt-2 pt-1">Total Pendapatan:</p>
                                                    @foreach ($total_pendapatan as $total_pendapatan)
                                                        <h5 class="font-size-18 mb-1">@php echo rupiah($total_pendapatan->total_pendapatan) @endphp</h5>
                                                    @endforeach

                                                </div>
                                            </div>
                                            <div class="col-md-6 dash-goal">
                                                <div class="mt-4 mt-sm-0">
                                                    <div id="list-chart-2" class="apex-charts" dir="ltr"></div>
                                                    <p class="text-muted mb-2 mt-2 pt-1">Produk Terjual:</p>
                                                    @foreach ($total_produk as $total_produk)
                                                        <h5 class="font-size-18 mb-1">{{ $total_produk->total_produk }}</h5>
                                                    @endforeach

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

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-4">Produk Terjual</h4>
                            <canvas id="myChart" width="100" height="30"></canvas>
                        </div>
                    </div>
                    <!--end card-->
                </div>
            </div>


        </div>
        <!-- container-fluid -->
    @endsection

    @section('css')
        <link href="/morvin/dist/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
            type="text/css" />

        <link href="/morvin/dist/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/morvin/dist/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="/morvin/dist/assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
        <link href="/morvin/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    @endsection

    @section('js')
        <!-- apexcharts -->
        <script src="/Chart.js/Chart.bundle.js"></script>

        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    @php
                        $data_produk = DB::table('pesanan')
                        ->join('produk','produk.id_produk','=','pesanan.id_produk')
                        ->select('pesanan.*','produk.nama_produk')
                        ->where('pesanan.status','selesai')
                        ->orWhere('pesanan.status','Barang Dalam Pengiriman')
                        ->get();
                    @endphp
                    labels: [
                        @php
                            foreach($data_produk as $data){
                                echo "'".$data->nama_produk."',";
                            };
                        @endphp
                    ],
                    datasets: [{
                        label: 'Produk',
                        data: [
                            @php
                            foreach($data_produk as $data2){
                                echo $data2->quantity.",";
                            };
                        @endphp
                        ],
                        backgroundColor: [
                            @php
                            foreach($data_produk as $data){
                                echo "'rgba(52, 76, 235, 1)',";
                            };
                            @endphp
                        ],
                        borderColor: [
                            @php
                            foreach($data_produk as $data){
                                echo "'rgba(52, 76, 235, 1)',";
                            };
                            @endphp
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>

        <script src="/morvin/dist/assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Plugins js-->
        <script src="/morvin/dist/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="/morvin/dist/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js">
        </script>

        <script src="/morvin/dist/assets/libs/select2/js/select2.min.js"></script>
        <script src="/morvin/dist/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="/morvin/dist/assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>
        <script src="/morvin/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="/morvin/dist/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

        <script src="/morvin/dist/assets/js/pages/dashboard.init.js"></script>


        <script src="/morvin/dist/assets/js/pages/form-advanced.init.js"></script>
    @endsection
