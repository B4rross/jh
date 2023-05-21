<?php
	declare(strict_types=1);

	require_once('../database/connection.db.php');
	require_once(__DIR__ . '/../database/session.class.php');
	$session = new Session();

	$db = getDatabaseConnection();
		
	require_once(__DIR__ . '/../templates/common.tpl.php');

	drawHeader($session);

	$stmt = $db->prepare('SELECT * FROM DEPARTMENT');
	$stmt->execute();
	$departments = $stmt->fetchAll();

	echo '<h1> Departments </h1>';

	foreach( $departments as $department) {
		echo '<p>Name: ' . $department['name'] . '</p>';
		echo '<h1>ID: ' . $department['id'] . '</h1>';
	}
	drawFooter();

	$stmt = $db->prepare('SELECT t.idTicket AS id, t.title, t.description, t.date, t.sttus AS status, t.idUsername AS creator_id, t.idDepartment AS departmentId, d.Department AS departmentName FROM Ticket t JOIN Department d ON t.idDepartment = d.idDepartment');
	$stmt->execute();
	$tickets = $stmt->fetchAll();
	
	echo '<h1>Tickets</h1>';
	
	foreach ($tickets as $ticket) {
		echo '<h1>ID: ' . $ticket['id'] . '</h1>';
		echo '<p>Title: ' . $ticket['title'] . '</p>';
		echo '<p>Description: ' . $ticket['description'] . '</p>';
		echo '<p>Date: ' . $ticket['date'] . '</p>';
		echo '<p>Status: ' . $ticket['status'] . '</p>';
		echo '<p>Creator: ' . $ticket['creatorId'] . '</p>';
		echo '<p>Department: ' . $ticket['departmentName'] . '</p>';
	}

?>