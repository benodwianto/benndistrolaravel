<div class="vertical-menu">

    <div data-simplebar class="h-100">


        <div class="user-sidebar text-center">
            <div class="dropdown">
                <div class="user-img">
                    @if (Auth::user()->foto_profile == null)
                        <img src="/annprint/default.jpg" alt="" class="rounded-circle">
                    @else
                        <img src="/foto_profile/{{ Auth::user()->foto_profile }}" alt="" class="rounded-circle">
                    @endif
                </div>
                <div class="user-info">
                    <h5 class="mt-3 font-size-16 text-white"> {{ Auth::user()->nama }}</h5>
                </div>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Produk BENN DISTRO</li>

                <li class="{{ request()->is('customer/produk/*') ? 'mm-active' : '' }}">
                    <a href="{{ Route('customer.produk') }}" class="waves-effect">
                        <i class="mdi mdi-tshirt-crew"></i><span> Produk BENN DISTRO</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="#" class="waves-effect">
                        <i class="mdi mdi-tshirt-crew-outline"></i><span> Produk Non Grosir</span>
                    </a>
                </li> --}}

                <li class="menu-title">Pesanan Saya</li>
                @php
                    $notif_pesanan_sidenav = DB::table('pesanan')
                        ->where('id_user', Auth::user()->id)
                        ->where(function ($query) {
                            $query->where('pesanan.status', 'Pesanan Di Terima')
                        ->orWhere('pesanan.status', 'menunggu pembayaran')
                        ->orWhere('pesanan.status', 'Bukti Pembayaraan Sedang Di Tinjau')
                        ->orWhere('pesanan.status', 'Pesanan Di Tolak');
                        })
                        ->get();
                @endphp
                <li class="{{ request()->is('customer/pesanan/*') ? 'mm-active' : '' }}">
                    <a href="{{ Route('pesanan.index') }}" class="waves-effect">
                        <i class="fas fa-truck"></i>
                        @if ($notif_pesanan_sidenav->count() > 0)
                            <span
                                class="badge rounded-pill bg-danger float-end">{{ $notif_pesanan_sidenav->count() }}</span>
                        @endif
                        <span> Pesanan Saya</span>
                    </a>
                </li>
                <li class="{{ request()->is('customer/riwayat/*') ? 'mm-active' : '' }}">
                    <a href="{{ Route('customer.riwayat') }}" class="waves-effect">
                        <i class="fas fa-history"></i>
                        <span> Riwayat Pesanan</span>
                    </a>
                </li>
                <li class="menu-title">Contact Us</li>
                @php
                    $notif_chat = DB::Table('chat')
                        ->where('to_id', Auth::user()->id)
                        ->where('status', 'off read')
                        ->get();
                @endphp
                <li class="{{ request()->is('customer/chat/*') ? 'mm-active' : '' }}">
                    <a href="{{ Route('customer.chat') }}" class="waves-effect">
                        <i class="dripicons-message"></i>
                        @if ($notif_chat->count() > 0)
                            <span class="badge rounded-pill bg-danger float-end">{{ $notif_chat->count() }}</span>
                        @endif
                        <span> Chat Admin</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ Route('customer.dashboard') }}" class="waves-effect">
                        <i class="dripicons-home"></i><span class="badge rounded-pill bg-info float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li> --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
