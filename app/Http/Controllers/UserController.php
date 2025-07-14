<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function userData(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            return response()->json([
                'status' => 'success',
                'data' => $user
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User not authenticated'
            ], 401);
        }
    }
}
