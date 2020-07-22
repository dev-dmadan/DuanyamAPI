<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \Firebase\JWT\JWT;
use Exception;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function login(Request $request)
    {
        $result = (Object)array(
            'Success'   => false,
            'Message'   => null,
            'Data'      => null
        );
        $status_code = 200;
        $isError = true;

        $userName = $request->has('UserName') ? $request->input('UserName') : null;
        $userPassword = $request->has('UserPassword') ? $request->input('UserPassword') : null;

        try {
            if(!$userName || !$userPassword) {
                $isError = false;
                throw new Exception('Username atau Password anda salah');
            }

            $dataUser = DB::table('users')->where('username', $userName)->get();
            if($dataUser->isEmpty()) {
                $isError = false;
                throw new Exception('Username atau Password anda salah');
            }

            if(!Hash::check($userPassword, $dataUser[0]->password)) {
                $isError = false;
                throw new Exception('Username atau Password anda salah');
            }

            $result->Data = (Object)array();
            $result->Data->UserId = $dataUser[0]->id;
            $result->Data->Name = $dataUser[0]->name;
            $result->Data->Token = $this->generateToken((Object)array(
                'UserId' => $dataUser[0]->id,
                'UserName' => $userName,
                'Name' => $dataUser[0]->name
            ));
            $result->Success = true;
        } catch (Exception $e) {
            $status_code = $isError ? 400 : 200;
            $result->Message = $e->getMessage();
        }

        return response()->json($result, $status_code);
    }

    private function generateToken($data)
    {
        $payload = array(
            "iss"   => env('APP_URL'),
            "aud"   => env('APP_URL'),
            "iat"   => time(),
            "nbf"   => time(),
            "exp"   => time() + (int)env('JWT_EXP'),
            "data"  => $data
        );
        $jwt = JWT::encode($payload, env('JWT_KEY'));

        return $jwt;
    }    
}