<?php
    declare(strict_types = 1);

    require_once(__DIR__ .'/../database/session.class.php');

    $session = new Session();

    if (!$session->isLoggedIn()){
        header('Location: login.php');
		exit();
    };

    require_once(__DIR__ .'/../templates/common.tpl.php');
    require_once(__DIR__ .'/../templates/user.tpl.php');
    require_once(__DIR__ .'/../database/user.class.php');
    require_once(__DIR__ .'/../database/connection.db.php');

    $db = getDatabaseConnection();
    $user = User::getUserById($db, $session->getId());

    drawEditProfileForm($user,$session);
    drawFooter();
?>