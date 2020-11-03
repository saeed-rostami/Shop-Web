<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class Auth extends Controller
{

//    public function login(Request $request)
//    {
//        $user = User::where('email', $request->emailOrPhone)
//            ->orWhere('phone', $request->emailOrPhone)
//            ->first();
//        $validateData = Validator::make($request->all(), [
//            'email' => 'required|email',
//            'password' => 'required',
//        ]);
//
//        if ($validateData->fails()) {
//            return response()->json(['response' => $validateData->messages(), 'success' => false], 400);
//        } else {
//            if (!auth()->attempt($request->all())) {
//                return response()->json(['Message' => 'Invalid Credentials'], 401);
//            }
//            $user = auth()->user();
//            $accessToken = $user->createToken('authToken')->accessToken;
//            return response()->json(['user' => $user, 'access_token' => $accessToken], 200);
//        }
//
//    }


//    login
    public function login(LoginRequest $request)
    {

        $http = new Client();
        try {
            $client = $http->post('http://localhost:8080/oauth/token',
                [
                    'form_params' => [
                        'grant_type' => 'password',
                        'client_id' => 2,
                        'client_secret' => 'JkMRyPQdRzU6932XE3q1aLSl8AtIsaGWJpwHFW2r',
                        'username' => $request->username,
                        'password' => $request->password,
                    ],

                ]);
            return json_decode((string)$client->getBody(), true);

        } catch (\GuzzleHttpExeption\BadResponseException $e) {
            if ($e->getCode() === 400) {
                return response()->json('invalid req.plz enter email password', $e->getMessage());
            } else if ($e->getCode() === 401) {
                return response()->json('try again', $e->getMessage());
            }
            return response()->json('server error', $e->getMessage());

        }
    }


//    register
    public function register(RegisterRequest $request)
    {
        $request['password'] = Hash::make($request['password']);
        $user = User::query()->create($request->toArray());

        $user->sendEmailVerificationNotification();

        return response([
            'message' => 'با موفقیت حساب کاربری شما ایجاد شد',
            'user' => $user,
        ]);
    }


//    logout
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'با موفقیت از حساب خود خارج شدید'
        ]);
    }

//user
    public function user(Request $request)
    {
        return response()->json(['user' => $request->user()]);
    }
}
