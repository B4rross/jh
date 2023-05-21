<?php
    declare(strict_types=1);

	require_once(__DIR__ . '/../database/session.class.php');
    $session = new Session();

    require_once(__DIR__ . '/../database/connection.db.php');

    $db = getDatabaseConnection();
    $stmt = $db->prepare('SELECT t.idTicket AS id, t.title, t.description, t.date, t.sttus AS status, t.idUsername AS creator_id, t.idDepartment AS department_id, d.Department AS department_name FROM Ticket t JOIN Department d ON t.idDepartment = d.idDepartment');
    $stmt->execute(['userID' => $session->getId()]);
    $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($tickets);
?>