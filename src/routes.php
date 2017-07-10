<?php

$app->group('', function () {
    $this->get('/tickets/{id_ticket}', '\Controller\TicketController:show');
    $this->post('/tickets', '\Controller\TicketController:store');

    $this->get('/users/{id_user}/tickets', '\Controller\TicketController:showUserTicket');
});
