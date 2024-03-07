@extends('home.layout.master')

@section('content')
    <!-- HEADING-BANNER START -->
    <div class="heading-banner-area overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h2>{{ $detail->nama_produk }}</h2>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="index.html">Produk</a></li>
                                <li>Detail Produk</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HEADING-BANNER END -->
    <!-- PRODUCT-AREA START -->
    <div class="product-area single-pro-area pt-80 pb-80 product-style-2">
        <div class="container">
            <div class="row shop-list single-pro-info no-sidebar">
                <!-- Single-product start -->
                <div class="col-lg-12">
                    <div class="single-product clearfix">
                        <!-- Single-pro-slider Big-photo start -->
                        <div class="single-pro-slider single-big-photo view-lightbox slider-for">
                            <div>
                                <img src="/produk/{{ $detail->foto_produk1 }}" alt="" />
                                <a class="view-full-screen" href="/produk/{{ $detail->foto_produk1 }}"
                                    data-lightbox="roadtrip" data-title="{{ $detail->nama_produk }}">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div>
                            <div>
                                <img src="/produk/{{ $detail->foto_produk2 }}" alt="" />
                                <a class="view-full-screen" href="/produk/{{ $detail->foto_produk2 }}"
                                    data-lightbox="roadtrip" data-title="{{ $detail->nama_produk }}">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div>
                            <div>
                                <img src="/produk/{{ $detail->foto_produk3 }}" alt="" />
                                <a class="view-full-screen" href="/produk/{{ $detail->foto_produk3 }}"
                                    data-lightbox="roadtrip" data-title="{{ $detail->nama_produk }}">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div>
                            <div>
                                <img src="/produk/{{ $detail->foto_produk4 }}" alt="" />
                                <a class="view-full-screen" href="/produk/{{ $detail->foto_produk4 }}"
                                    data-lightbox="roadtrip" data-title="{{ $detail->nama_produk }}">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Single-pro-slider Big-photo end -->
                        <div class="product-info">
                            <div class="fix">
                                <h4 class="post-title floatleft">{{ $detail->nama_produk }}</h4>
                            </div>
                            <div class="fix mb-20">
                                <span class="pro-price"></span>
                            </div>
                            <div class="product-description">
                                <p>
                                    {{ $detail->nama_produk }} merupakan bahan utama sablon manual atau digital, dengan
                                    bahan kualitas terbaik
                                    dengan harga terjangkau. tida hanya itu bahan {{ $detail->nama_produk }} sangat mudah
                                    dalam perawatan dan tidak luntur
                                </p>
                                <p>
                                    <b>Berikut Daftar Harga</b>
                                </p>
                                <div class="">
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
                                            <tr>
                                                <td>
                                                    @if ($detail->harga_produk1 == null)
                                                        {{ 'Harga Tidak Tersedia' }}
                                                    @else
                                                        @php
                                                            echo rupiah($detail->harga_produk1);
                                                        @endphp
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($detail->harga_produk2 == null)
                                                        {{ 'Harga Tidak Tersedia' }}
                                                    @else
                                                        @php
                                                            echo rupiah2($detail->harga_produk2);
                                                        @endphp
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($detail->harga_produk3 == null)
                                                        {{ 'Harga Tidak Tersedia' }}
                                                    @else
                                                        @php
                                                            echo rupiah3($detail->harga_produk3);
                                                        @endphp
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($detail->harga_produk4 == null)
                                                        {{ 'Harga Tidak Tersedia' }}
                                                    @else
                                                        @php
                                                            echo rupiah4($detail->harga_produk4);
                                                        @endphp
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($detail->harga_produk5 == null)
                                                        {{ 'Harga Tidak Tersedia' }}
                                                    @else
                                                        @php
                                                            echo rupiah5($detail->harga_produk5);
                                                        @endphp
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- color start -->
                            <div class="color-filter single-pro-color mb-20 clearfix">
                                <ul>
                                    <li><span class="color-title text-capitalize">Warna</span></li>
                                    <li> : </li>
                                    <li>&nbsp Seluruh Warna Tersedia / All Color</li>
                                </ul>
                            </div>
                            <!-- color end -->
                            <!-- Size start -->
                            <div class="size-filter single-pro-size mb-35 clearfix">
                                <ul>
                                    <li><span class="color-title text-capitalize">Ukuran</span></li>
                                    <li> : </li>
                                    <li>&nbsp Seluruh Ukuran Tersedia / All Size</li>
                                </ul>
                            </div>
                            <!-- Size end -->
                            {{-- <div class="col-md-3">
                                <label for="ex3"><b>Masukan Jumlah Pembelian</b></label>
                                <div class="input-group">
                                    <input type="button" value="-" class="button-minus" data-field="quantity">
                                    <input type="number" class="form-control" step="1" min="6" max="10"
                                        value="6" name="quantity" class="quantity-field">
                                    <input type="button" value="+" class="button-plus" data-field="quantity">
                                </div>
                            </div> --}}
                            <div class="mt-20">
                                <button id="myBtn" type="button" data-text="Pesan Sekarang"
                                    class="submit-button submit-btn-2 button-one w-100" style="background-color:black">
                                    <center>Pesan
                                        Sekarang</center>
                                </button><br>
                            </div>
                            <!-- The Modal -->
                            <div id="myModal" class="modal">

                                <!-- Modal content -->
                                <div class="modal-content">
                                    <p style="color:red;">
                                        Maaf Untuk Melakukan Pemesanan Di Wajibkan Login Terlebih Dahulu
                                    </p>
                                    <a href="/login"  class="btn btn-success">Login Sekarang</a>
                                    <span class="close"></span>
                                </div>

                            </div>
                            <!-- Single-pro-slider Small-photo start -->
                            <div class="single-pro-slider single-sml-photo slider-nav">
                                <div>
                                    <img src="/produk/{{ $detail->foto_produk1 }}" alt="" />
                                </div>
                                <div>
                                    <img src="/produk/{{ $detail->foto_produk2 }}" alt="" />
                                </div>
                                <div>
                                    <img src="/produk/{{ $detail->foto_produk3 }}" alt="" />
                                </div>
                                <div>
                                    <img src="/produk/{{ $detail->foto_produk4 }}" alt="" />
                                </div>
                            </div>
                            <!-- Single-pro-slider Small-photo end -->
                        </div>
                    </div>
                </div>
                <!-- Single-product end -->
            </div>
            <!-- single-product-tab start -->
            <div class="single-pro-tab">
                <div class="row">
                    <div class="col-md-3">
                        <div class="single-pro-tab-menu">
                            <!-- Nav tabs -->
                            <ul class="nav d-block">
                                <li><a class="active" href="#description" data-bs-toggle="tab">Deskripsi Produk</a></li>
                                <li><a href="#reviews" data-bs-toggle="tab">Reviews Pelanggan</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="description">
                                <div class="pro-tab-info pro-description">
                                    <h3 class="tab-title title-border mb-30">Deskripsi</h3>
                                    @php
                                        echo htmlspecialchars_decode($detail->deskripsi);
                                    @endphp
                                </div>
                            </div>
                            <div class="tab-pane" id="reviews">
                                <div class="pro-tab-info pro-reviews">
                                    <div class="customer-review mb-60">
                                        <h3 class="tab-title title-border mb-30">Review Pelanggan</h3>
                                        <ul class="product-comments clearfix">
                                            @foreach ($komentar as $komentar)
                                            <li class="mb-30">
                                                <div class="pro-reviewer">
                                                    <img src="/annprint/default.jpg" alt="" />
                                                </div>
                                                <div class="pro-reviewer-comment">
                                                    <div class="fix">
                                                        <div class="floatleft mbl-center">
                                                            <h5 class="text-uppercase mb-0"><strong>{{ Str::title($komentar->nama) }}</strong>
                                                            </h5>
                                                            <p class="reply-date">{{ $komentar->created_at }}</p>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0">{{ $komentar->komentar_produk }}</p>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single-product-tab end -->
        </div>
    </div>
    <!-- PRODUCT-AREA END -->
@endsection

@section('js')
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function incrementValue(e) {
            e.preventDefault();
            var fieldName = $(e.target).data('field');
            var parent = $(e.target).closest('div');
            var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

            if (!isNaN(currentVal)) {
                parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
            } else {
                parent.find('input[name=' + fieldName + ']').val(0);
            }
        }

        function decrementValue(e) {
            e.preventDefault();
            var fieldName = $(e.target).data('field');
            var parent = $(e.target).closest('div');
            var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

            if (!isNaN(currentVal) && currentVal > 0) {
                parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
            } else {
                parent.find('input[name=' + fieldName + ']').val(0);
            }
        }

        $('.input-group').on('click', '.button-plus', function(e) {
            incrementValue(e);
        });

        $('.input-group').on('click', '.button-minus', function(e) {
            decrementValue(e);
        });
    </script>
@endsection

@section('css')
    <style>
        input,
        textarea {
            border: 1px solid #eeeeee;
            box-sizing: border-box;
            margin: 0;
            outline: none;
            padding: 10px;
        }

        input[type="button"] {
            -webkit-appearance: button;
            cursor: pointer;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        .input-group {
            clear: both;
            margin: 15px 0;
            position: relative;
        }

        .input-group input[type='button'] {
            background-color: #eeeeee;
            min-width: 38px;
            width: auto;
            transition: all 300ms ease;
        }

        .input-group .button-minus,
        .input-group .button-plus {
            font-weight: bold;
            height: 38px;
            padding: 0;
            width: 38px;
            position: relative;
        }

        .input-group .quantity-field {
            position: relative;
            height: 38px;
            left: -6px;
            text-align: center;
            width: 62px;
            display: inline-block;
            font-size: 13px;
            margin: 0 0 5px;
            resize: vertical;
        }

        .button-plus {
            left: -13px;
        }

        input[type="number"] {
            -moz-appearance: textfield;
            -webkit-appearance: none;
        }

        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            text-align: center;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
@endsection
