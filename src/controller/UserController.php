<?php

namespace Controller;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\User;
use Firebase\JWT\JWT;
use Utils\JWTUtils as JWTUtils;

class UserController {
    /**
    public function show(Request $request, Response $response, $args) {
       $user = User::with('Ticket')->find($id);
        return ($ticket) ? $response->withJson($ticket) : $response->withStatus(404);
    }*/

    public function store(Request $request, Response $response, $args) {
        $idUser = $request->getParsedBody()['id_user'];
        $idEmitter = $request->getParsedBody()['id_emitter'];
        $ticket = Ticket::create(['id_user' => $idUser, 'id_emitter' => $idEmitter, 'code' => Ticket::generateCode()]);
        return $response->withJson($ticket);
    }
    
    public function login(Request $request, Response $response, $args) {
        $user =  $request->getParsedBody()['user'];
        $password =  $request->getParsedBody()['password'];

        $userReturn = User::where('user',$user)->where('password',$password)->first();

        $key = JWTUtils::KEY;
        $token = array(
            "iss" => "http://example.org",
            "aud" => "http://example.com",
            "user_id" => $userReturn->id
        );
        $jwt = JWT::encode($token, $key);

        return $response->withJson($jwt);
    }

    public function jwt(Request $request, Response $response, $args) {
        $string = $request->getParsedBody()['jwt'];
        $key = \JWTUtils::KEY;
        $return = JWT::decode($string, $key, array('HS256'));
        print_r($return);
        die();
    }

}
