<?php

    declare(strict_types=1);

	require_once(__DIR__ . '/../database/session.class.php');
    $session = new Session();

    require_once(__DIR__ . '/../database/connection.db.php');

    $db = getDatabaseConnection();

    $stmt = $db->prepare('SELECT idDepartment FROM Department');
    $stmt->execute();
    $departments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($departments);
?>