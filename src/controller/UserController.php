<?php

namespace Controller;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\User;
use Utils\TokenAuth;

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
        $token = TokenAuth::generate($userReturn);
        return $response->withJson($token->token);
    }

}
