<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ChatMessage;
use App\Events\ChatMessageSent;

class ChatMessageController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.chat_messages');
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return ChatMessage::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->chat_messages()->create([
            'message' => $request->input('message')
        ]);
        
        broadcast(new ChatMessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];

        return ['success' => true, 'message' => 'Message Successfully Sent!'];
    }
}
