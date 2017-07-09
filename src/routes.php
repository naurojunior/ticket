<?php

$app->get('/tickets/{id_ticket}', '\Controller\TicketController:show');
$app->post('/tickets', '\Controller\TicketController:store');

$app->get('/users/{id_user}/tickets', '\Controller\TicketController:showUserTicket');