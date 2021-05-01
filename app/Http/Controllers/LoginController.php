<?php

namespace App\Http\Controllers;
use \Firebase\JWT\JWT;
use App\Models\Registration;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function tokenTest()
    {
        return "TOKEN is OK";
    }
    public function onLogin(Request $request)
    {

        $username = $request->input('username');
        $passsword = $request->input('passsword');
        $userCount = Registration::where(['username'=>$username,'passsword'=>$passsword])->count();

        if ($userCount == 1)
        {
            $key = env('TOKEN_KEY');

            $payload = array(
                "site" => "http://demo.com",
                "user" => $username,
                "iat" => time(),
                "exp" => time()+3600
            );
            $jwt = JWT::encode($payload, $key);
            return response()->json(['TOKEN'=>$jwt,'STATUS'=>'Login Success']);

        }else
            {
                return "Login Failed";
            }
    }
}
