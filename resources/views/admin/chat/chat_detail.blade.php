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
                <div class="chat-leftsidebar me-lg-4">
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
                                                                <span class="badge bg-danger">{{ $badge->count() }} Pesan
                                                                    Belum Di
                                                                    Baca</span>
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
                <div class="w-100 user-chat">
                    <div class="card">
                        <div class="p-4 border-bottom ">
                            <div class="row">
                                <div class="col-md-4 col-9">
                                    <h5 class="font-size-15 mb-1 text-truncate">{{ Str::title($nama_user->nama) }}</h5>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="chat-conversation p-3">
                                <ul class="list-unstyled" data-simplebar style="max-height: 300px;">
                                    @foreach ($pesan as $pesan)
                                        <li class="{{ $pesan->from_id == Auth::user()->id ? '' : 'right' }}">
                                            <div class="conversation-list">

                                                <div class="media">

                                                    @if ($pesan->to_id == Auth::user()->id)
                                                        @if (Auth::user()->foto_profile == null)
                                                            <img src="/annprint/admin.jpg" class="rounded-circle avatar-xs"
                                                                alt="">
                                                        @else
                                                            <img src="/annprint/admin.jpg" class="rounded-circle avatar-xs"
                                                                alt="">
                                                        @endif
                                                    @else
                                                        @if (Auth::user()->foto_profile == null)
                                                        <img src="/annprint/default.jpg" class="rounded-circle avatar-xs"
                                                            alt="">
                                                        @else
                                                        <img src="/foto_profile/{{ $nama_user->foto_profile }}" class="rounded-circle avatar-xs"
                                                            alt="">
                                                        @endif
                                                    @endif
                                                    <div class="media-body arrow-left ms-3">

                                                        <div class="ctext-wrap">
                                                            <div class="conversation-name"></div>
                                                            <p>
                                                                {{ $pesan->pesan }}
                                                            </p>
                                                            <p class="chat-time mb-0"><i
                                                                    class="bx bx-time-five align-middle me-1"></i>{{ $pesan->created_at }}
                                                            </p>
                                                        </div>


                                                    </div>
                                                </div>

                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="p-3 chat-input-section">
                                <form action="{{ route('admin.post_chat') }}" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="row">
                                        <div class="col">
                                            <div class="position-relative">
                                                <input type="text" name="id_from" class="form-control chat-input"
                                                    placeholder="" value="{{ $id }}" hidden>
                                            </div>
                                            <div class="position-relative">
                                                <input type="text" name="pesan" class="form-control chat-input"
                                                    placeholder="Enter Message..." required>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit"
                                                class="btn btn-primary btn-rounded chat-send w-md waves-effect waves-light"><span
                                                    class="d-none d-sm-inline-block me-2">Send</span> <i
                                                    class="mdi mdi-send"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


        </div>


    </div>
@endsection
