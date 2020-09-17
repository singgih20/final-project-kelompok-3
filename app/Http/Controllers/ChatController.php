<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Events\ChatStoredEvent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        return Chat::with('user')->orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        $chat = Chat::create([
            'message' => $request->message,
            'username' => auth()->user()->username
        ]);

        broadcast(new ChatStoredEvent($chat))->toOthers();

        return $chat;
    }
}
