<?php

namespace Middleware;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Utils\TokenAuth;

class TokenAuthMiddleware
{
    public function __invoke(Request $request,Response $response, $next)
    {
        if(!$request->getHeader('token') || !TokenAuth::validate($request->getHeader('token')[0])){
            return $response->withStatus(401);
        }

        $response = $next($request, $response);

        return $response;
    }
}