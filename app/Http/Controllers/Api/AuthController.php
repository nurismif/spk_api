<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
     public function login(Request $request)
     {
          $validator = Validator::make($request->all(), [
               'username' => 'required|string',
               'password' => 'required|string',
          ]);
          if ($validator->fails()) {
               return $this->errorResponse($validator->errors()->first());
          }
          $user = User::where('username', $request->username)->first();
          if ($user) {
               if (Hash::check($request->password, $user->password)) {
                    $token = $user->createToken('authToken')->accessToken;
                    $response = ['key' => $token];
                    return response($response, 200);
               } else {
                    return $this->errorResponse("Invalid login credentials");
               }
          } else {
               return $this->errorResponse("User does not exist", 404);
          }
     }

     public function logout(Request $request)
     {
          $token = $request->user()->token();
          $token->revoke();
          return $this->successResponse(null, "You have been successfully logged out!");
     }
}
