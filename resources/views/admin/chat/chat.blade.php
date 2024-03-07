@extends('admin.layouts.master')

@section('content')
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Chat Admin</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Chat Admin</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <div class="page-content-wrapper">




            <div class="d-lg-flex">
                <div class="chat-leftsidebar col-lg-12">
                    <div class="card">


                        <div class="p-4">
                            <div>
                                <h5 class="font-size-16 mb-3">Chat</h5>
                                <ul class="list-unstyled chat-list" data-simplebar style="max-height:500px;">
                                    @foreach ($chat as $chat)
                                        @php
                                            $badge = DB::Table('chat')
                                                ->where('from_id', $chat->id)
                                                ->where('status', 'off read')
                                                ->get();
                                        @endphp
                                        <li>
                                            <a href="{{ route('admin.chat_detail', $chat->id) }}">
                                                <div class="media">
                                                    <div class="align-self-center me-3">
                                                        @if ($chat->foto_profile == null)
                                                            <img src="/annprint/default.jpg"
                                                                class="rounded-circle avatar-sm" alt="">
                                                        @else
                                                            <img src="/foto_profile/{{ $chat->foto_profile }}"
                                                                class="rounded-circle avatar-sm" alt="">
                                                        @endif
                                                    </div>

                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="text-truncate font-size-14 mb-1">{{ $chat->nama }}
                                                            @if ($badge->count() > 0)
                                                                <span
                                                                    class="badge rounded-pill bg-danger float-end">{{ $badge->count() }} Pesan Belum
                                                                    Di Baca</span>
                                                            @endif
                                                        </h5>
                                                        <p>Customer</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->


        </div>


    </div>
@endsection
