<?php

namespace Controller;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Ticket;

class TicketController {

    public function show(Request $request, Response $response, $args) {
        $ticket = Ticket::where('code', $request->getAttribute('id_ticket'))->first();
        return ($ticket) ? $response->withJson($ticket) : $response->withStatus(404);
    }

    public function store(Request $request, Response $response, $args) {
        $idUser = $request->getParsedBody()['id_user'];
        $idEmitter = $request->getParsedBody()['id_emitter'];
        $ticket = Ticket::create(['id_user' => $idUser, 'id_emitter' => $idEmitter, 'code' => Ticket::generateCode()]);
        return $response->withJson($ticket);
    }

    public function showUserTicket(Request $request, Response $response, $args) {
        $idUser = $request->getAttribute('id_user');
        $ticket = Ticket::where('id_user',$idUser)->get();
        return ($ticket) ? $response->withJson($ticket) : $response->withStatus(404);
    }

}
