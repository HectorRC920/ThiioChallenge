<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
    {
      $user = User::where('email', request('email'))->first();
      if(!$user){
        $user = User::create([
          'email' => request('email'),
          'name' => request('name'),
          'password' => request('password')
        ]);
        return response()->json([
          'status' => 201,
          'message' => 'User Created'
        ]);
      }
      return response()->json([
        'status' => 200,
        'message' => 'User Found'
      ]);
    }
}
