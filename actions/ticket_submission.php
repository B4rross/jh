<?php

    declare(strict_types=1);

    require_once(__DIR__ .'/../database/session.class.php');
    $session = new Session();

    require_once(__DIR__ . '/../database/connection.db.php');

    $db = getDatabaseConnection();

    $ticket = Ticket::createTicket($db, $_POST('title'), $_POST('description'), $_POST('department'));
?>