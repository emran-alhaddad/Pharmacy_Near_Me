<?php

namespace App\Http\Controllers;


use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\Messages;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    public function index() {
        // Show just the users and not the admins as well
        $users = User::where('is_active', true)->get();

        if (auth()->user()->is_active == true) {
            $messages = Messages::where('user_id', auth()->id())->orWhere('receiver', auth()->id())->get();
        }

        return view('user.chat.home', [
            'users' => $users,
            'messages' => $messages ?? null
        ]);
    }

    public function show($id) {
        if (auth()->user()->is_active == false) {
            abort(404);
        }

        $sender = User::findOrFail($id);

        $users = User::with(['message' => function($query) {
            return $query->orderBy('created_at', 'ASC');
        }])->where('is_active', true)
            ->orderBy('id', 'ASC')
            ->get();

        if (auth()->user()->is_active == true) {
            $messages = Messages::where('user_id', auth()->id())->orWhere('receiver', auth()->id())->get();
        } else {
            $messages = Messages::where('user_id', $sender)->orWhere('receiver', $sender)->get();
        }

        return view('user.chat.show', [
            'users' => $users,
            'messages' => $messages,
            'sender' => $sender,
        ]);
    }

}