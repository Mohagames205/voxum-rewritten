<?php

namespace App\Http\Controllers;

use App\Events\UserVerified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class VerificationController extends Controller
{

    public function startVerification(Request $request)
    {
        $randomCode = mt_rand(10e5, 10e06);

        Redis::set("VERIFY_" . $randomCode, Str::random(), 'EX', 200);

        return view("verify", ["code" => $randomCode]);
    }

    public function postVerification(Request $request)
    {

        $code = $request->get("code");
        $username = $request->get("username");

        if(Redis::get("VERIFY_" . $code) !== null) {
            UserVerified::dispatch($username, $code);
            return response(["is_correct" => true], 200);
        }

        return response(["is_correct" => false], 200);
    }


}
