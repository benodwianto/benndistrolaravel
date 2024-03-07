@extends('home.layout.master')

@section('content')
    <div class="heading-banner-area overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h2></h2>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li>Pendaftaraan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HEADING-BANNER END -->
    <!-- SHOPPING-CART-AREA START -->
    <div class="login-area  pt-80 pb-80">
        <div class="container">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row justify-content-md-center">
                    <div class="col-lg-4">
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="customer-login text-left">
                            <h4 class="title-1 title-border text-uppercase mb-30">Pendaftaraan Konsumen Baru</h4>
                            <br><center><p>Repost by <a href='https://stokcoding.com/' title='StokCoding.com' target='_blank'>StokCoding.com</a></p></center>

                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" name="name">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Alamat Email">
                            <input type="password" placeholder="Kata Sandi" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                            <input type="password" placeholder="Tulis Ulang Kata Sandi" class="form-control" name="password_confirmation">
                            <button type="submit" data-text="Daftar Akun"
                                class="button-one submit-button mt-15 w-100">Buat Akun Baru</button>
                                {{-- <p style="text-align: center" class="mt-2">Belum Punya Akun ? &nbsp;&nbsp;<a href="/register" style="color:blue"><u> Daftar Akun Baru </u></a></p> --}}
                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                        <div class="customer-login text-left">
                            <h4 class="title-1 title-border text-uppercase mb-30">new customers</h4>
                            <p class="text-gray">If you have an account with us, Please login!</p>
                            <input type="text" placeholder="Your name here..." name="name">
                            <input type="text" placeholder="Email address here..." name="email">
                            <input type="password" placeholder="Password">
                            <input type="password" placeholder="Confirm password">
                            <p class="mb-0">
                                <input type="checkbox" id="newsletter" name="newsletter" checked>
                                <label for="newsletter"><span>Sign up for our newsletter!</span></label>
                            </p>
                            <button type="submit" data-text="regiter"
                                class="button-one submit-button mt-15">regiter</button>
                        </div>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>
@endsection
