<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class LovematchController extends Controller
{
    
    public function get_matches(Request $request) {
        $matches = [];
        return response()->json([
            'data' => $matches,
            'api' => 'lovematch/get_matches',
            'ts' => Carbon::now()->timestamp
        ]);           
    }

    public function like_match(Request $request) {
        $match = [];
        return response()->json([
            'data' => $match,
            'api' => 'lovematch/like_match',
            'ts' => Carbon::now()->timestamp
        ]);          
    }

    public function save_match(Request $request) {
        $match = [];
        return response()->json([
            'data' => $match,
            'api' => 'lovematch/save_match',
            'ts' => Carbon::now()->timestamp
        ]);                  
    }

    public function block_match(Request $request) {
        $match = [];
        return response()->json([
            'data' => $match,
            'api' => 'lovematch/block_match',
            'ts' => Carbon::now()->timestamp
        ]);                
    }
}
