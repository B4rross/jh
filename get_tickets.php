<?php
    declare(strict_types=1);


    require_once(__DIR__ . '/../utils/session.php');
    $session = new Session();

    require_once(__DIR__ . '/../database/connection.db.php');

    $db = getDatabaseConnection();
    $stmt = $db->query('SELECT * FROM TICKET WHERE creator_id = :userID');
    $stmt->execute(['userID' => $session->getId()]);
    $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($tickets);
?>