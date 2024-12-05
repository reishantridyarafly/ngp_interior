<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ChMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function getUnreadMessages()
    {
        $unreadMessages = ChMessage::where('to_id', Auth::user()->id)
            ->where('seen', 0)
            ->count();
        return response()->json(['unreadMessages' => $unreadMessages]);
    }
}
