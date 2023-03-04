<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function get_rooms(Request $request) {
        $rooms = [];
        return response()->json([
            'data' => $rooms,
            'api' => 'lovematch/get_rooms',
            'ts' => Carbon::now()->timestamp
        ]);            
    }

    public function get_room(Request $request) {
        $room = [];
        return response()->json([
            'data' => $room,
            'api' => 'lovematch/get_room',
            'ts' => Carbon::now()->timestamp
        ]);                 
    }

    public function send_message(Request $request) {
        $message = [];
        return response()->json([
            'data' => $message,
            'api' => 'lovematch/send_message',
            'ts' => Carbon::now()->timestamp
        ]);            
    }
}
