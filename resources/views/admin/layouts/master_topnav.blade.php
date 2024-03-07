<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="/morvin/dist/assets/images/bennlogo.png" alt="" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="/morvin/dist/assets/images/dist.png" alt="" height="40">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="/morvin/dist/assets/images/benlogo.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="/morvin/dist/assets/images/dist.png" alt="" height="20">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

        </div>
        @php
            $notif_topnav_pesanan = DB::table('pesanan')
                ->where('pesanan.status', 'Bukti Pembayaraan Sedang Di Tinjau')
                ->orWhere('pesanan.status', 'Pesanan Di Terima')
                ->orderBy('pesanan.updated_at', 'desc')
                ->get();
            $notif_topnav_pesanan_berjalan = DB::table('pesanan')
                ->where('pesanan.status', 'Pesanan Di Terima')
                ->orderBy('pesanan.updated_at', 'desc')
                ->get();
            $notif_topnav_pesanan_onpaid = DB::table('pesanan')
                ->where('pesanan.status', 'Bukti Pembayaraan Sedang Di Tinjau')
                ->orderBy('pesanan.updated_at', 'desc')
                ->get();
        @endphp

        <!-- Search input -->
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input form-control" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div>

        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item toggle-search noti-icon waves-effect"
                    data-target="#search-wrap">
                    <i class="mdi mdi-magnify"></i>
                </button>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="mdi mdi-bell-outline bx-tada"></i>
                    @if ($notif_topnav_pesanan->count() > 0)
                        <span class="badge rounded-pill bg-danger float-end">{{ $notif_topnav_pesanan->count() }}</span>
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('pesananAdmin.index') }}" class="small"> View All</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        @if ($notif_topnav_pesanan_onpaid->count() > 0)
                        <a href="{{ route('pesananAdmin.index') }}" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-danger rounded-circle font-size-16">
                                        <i class="mdi mdi-check text-white"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Permintaan Konfirmasi</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">{{$notif_topnav_pesanan_onpaid->count() }} Orderan Meminta Konfirmasi Pembayaran</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endif

                        @if ($notif_topnav_pesanan_berjalan->count() > 0)
                            <a href="{{ route('pesananAdmin.index') }}" class="text-reset notification-item">
                                <div class="media">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title bg-success rounded-circle font-size-16">
                                            <i class="mdi mdi-cart text-white"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">Orderan Yang Berjalan / On-Proses</h6>
                                        <div class="font-size-13 text-muted">
                                            <p class="mb-1">Orderan Dalam Pengerjaan
                                                {{ $notif_topnav_pesanan_berjalan->count() }} Orderan</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 w-100 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (Auth::user()->foto_profile == NULL)
                    <img class="rounded-circle header-profile-user" src="/annprint/default.jpg"
                        alt="Header Avatar">
                    @else
                    <img class="rounded-circle header-profile-user" src="/foto_profile/{{ Auth::user()->foto_profile }}"
                        alt="Header Avatar">
                    @endif
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('admin.profile') }}"><i
                            class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"
                        {{ __('Logout') }}><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i>
                        Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

            {{-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="mdi mdi-cog-outline font-size-20"></i>
                </button>
            </div> --}}

        </div>
    </div>
</header>
