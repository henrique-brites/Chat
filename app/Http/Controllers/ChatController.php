<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;;
//use Modules\Logs\Entities\Log;
use App\Chat;
use App\ChatMessage;




class ChatController extends Controller
{

    public function sendMessage(Request $request)
    { 
        $dados = $request->all();
    
        $username = $dados['username'];
        $text = $dados['text'];

        $chatMessage = new ChatMessage();
        $chatMessage->sender_username = $username;
        $chatMessage->message = $text;
        $chatMessage->save();
    }

    public function isTyping(Request $request)
    {
        $dados = $request->all();
        $username = $dados['username'];

        $chat = Chat::find(1);
        if ($chat->user1 == $username)
            $chat->user1_is_typing = true;
        else
            $chat->user2_is_typing = true;
        $chat->save();
    }

    public function notTyping(Request $request)
    {
        $dados = $request->all();
        $username = $dados['username'];

        $chat = Chat::find(1);
        if ($chat->user1 == $username)
            $chat->user1_is_typing = false;
        else
            $chat->user2_is_typing = false;
        $chat->save();
    }

    public function retrieveChatMessages(Request $request)
    {
        //echo "Cheguei no retrieveChatMessages jhjhvjhvjhv";
        //die();
        $dados = $request->all();

        $username = $dados['username'];

        $message = ChatMessage::where('sender_username', '!=', $username)->where('read', '=', false)->first();
//var_dump($message);
//die();
        if ($message != NULL)
        {
            // $m=[
            //     'read' => true,
            // ];
            //$message['read'] = true;
            $message->update([
                'read' => true,
            ]);
            return $message['message'];
        }
    }

    public function retrieveTypingStatus(Request $request)
    {
        $dados = $request->all();
        //echo "Cheguei no retrieveTypingStatus";
        //die();
        $username = $dados['username'];

        $chat = Chat::find(1);
        if ($chat->user1 == $username)
        {
            if ($chat->user2_is_typing)
                return $chat->user2;
        }
        else
        {
            if ($chat->user1_is_typing)
                return $chat->user1;
        }
    }
}