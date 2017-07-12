<?php

namespace Utils;

use App\Token;
use App\User;

class TokenAuth
{

    public static $user;

    public static function validate($token){
        $token = Token::where('token', $token)->first();
        if($token){
            TokenAuth::$user = $token->user;
            return true;
        }
    }

    public static function generate(User $user){
        $token = new Token();
        $token->user_id = $user->id;
        $token->token = Token::generate();
        $token->save();
        return $token;
    }

}