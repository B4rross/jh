<?php
	declare(strict_types=1);

	require_once('../database/connection.db.php');
	require_once(__DIR__ . '/../database/session.class.php');
	$session = new Session();

	$db = getDatabaseConnection();
		

	require_once(__DIR__ . '/../templates/common.tpl.php');

	drawHeader($session);
?>