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
                                <li>Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-us-area  pt-80 pb-80">
        <div class="container">
            <div class="contact-us customer-login bg-white">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="contact-details">
                            <h4 class="title-1 title-border text-uppercase mb-30">contact details</h4>
                            <ul>
                                <li>
                                    <i class="zmdi zmdi-pin"></i>
                                    <span>Kuranji Bumi Minang 1,</span>
                                    <span>Padang, Indonesia</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-phone"></i>
                                    <span>082282795284</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 mt-xs-30">
                        <div class="map-area">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.942952982681!2d110.35331821477344!3d-7.015991694932063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x54b4886d0350da7c!2zN8KwMDAnNTcuNiJTIDExMMKwMjEnMTkuOCJF!5e0!3m2!1sid!2sid!4v1667545084070!5m2!1sid!2sid" width=100% height=600px; style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
