<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

use Illuminate\Support\Facades\Auth;

class RegisterResponse implements RegisterResponseContract
{        
    public function toResponse($request)
    {
        // below is the existing response
        // replace this with your own code

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('success_register');
    }
}