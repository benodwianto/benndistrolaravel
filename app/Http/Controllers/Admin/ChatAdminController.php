<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatAdminController extends Controller
{
    public function index()
    {
        $chat = Chat::join('users', 'users.id', '=', 'chat.from_id')
        ->select('users.id', 'users.nama', 'users.foto_profile', DB::raw('COUNT(*) AS total'))
        ->where('chat.to_id', Auth::user()->id)
        // ->where('chat.status','off read')
        ->groupBy('users.id', 'users.nama', 'users.foto_profile')
        ->orderBy('chat.created_at', 'desc')
        ->get();

        return view('admin.chat.chat', compact(['chat']));
    }

    public function detail_chat($id)
    {
        Chat::where('from_id', $id)->update([
            'status'=>'on read'
        ]);

        $chat = Chat::join('users', 'users.id', '=', 'chat.from_id')
        ->select('users.id', 'users.nama', 'users.foto_profile', DB::raw('COUNT(*) AS total'))
        ->where('chat.to_id', Auth::user()->id)
        // ->where('chat.status','off read')
        ->groupBy('users.id', 'users.nama', 'users.foto_profile')
        ->orderBy('chat.created_at', 'desc')
        ->get();

        $pesan = Chat::where('to_id', $id)
        ->where('from_id', Auth::user()->id)
        ->orWhere('to_id', Auth::user()->id)
        ->where('from_id', $id)
        ->orderBy('created_at', 'asc')
        ->get();

        $id = $id;

        $nama_user = User::find($id);

        return view('admin.chat.chat_detail', compact(['chat','pesan', 'id', 'nama_user']));
    }

    public function send(Request $request)
    {
        Chat::create([
            'from_id'=>1,
            'to_id'=>$request->id_from,
            'pesan'=>$request->pesan,
            'status'=>'off read',
        ]);

        return back();
    }
}
