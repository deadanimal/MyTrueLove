<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Throwable;

class ProfileController extends Controller
{

    public function register(Request $request) {

        try {

            $data = $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'password' => 'required|string|confirmed'
            ]);
    
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])
            ]);
    
            $token = $user->createToken('apiToken')->plainTextToken;
    
            $registration = [
                'user' => $user,
                'token' => $token
            ];

            return response()->json([
                'data' => $registration,
                'api' => 'profile/register',
                'ts' => Carbon::now()->timestamp
            ], 201);  

        } catch (Throwable $error_message) {
            report($error_message);
     
            return response()->json([
                'error' => $error_message,
                'api' => 'profile/register',
                'ts' => Carbon::now()->timestamp
            ], 500);  
        }
        
    }

    public function create_token(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();


        if (!$user || !Hash::check($request->password, $user->password)) {

            return response()->json([
                'error' => 'Credentials provided is incorrect',
                'api' => 'profile/create_token',
                'ts' => Carbon::now()->timestamp
            ], 401);            
        }

        return response()->json([
            'token' => $user->createToken($request->device_name)->plainTextToken,
            'api' => 'profile/create_token',
            'ts' => Carbon::now()->timestamp
        ], 201);              
    }

    public function upload_image(Request $request) {
        $image = '';
        return response()->json([
            'data' => $image,
            'api' => 'profile/upload_image',
            'ts' => Carbon::now()->timestamp
        ]);
    }

    public function get_questions(Request $request) {
        $questions = [];
        return response()->json([
            'data' => $questions,
            'api' => 'profile/get_questions',
            'ts' => Carbon::now()->timestamp
        ]);
    }

    public function answer_question(Request $request) {
        $answer = [];
        return response()->json([
            'data' => $answer,
            'api' => 'profile/answer_question',
            'ts' => Carbon::now()->timestamp
        ]);        
    }

}
