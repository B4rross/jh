<?php
    declare(strict_types = 1);

    require_once(__DIR__ .'/../database/session.class.php');

    $session = new Session();

    require_once(__DIR__ .'/../database/connection.db.php');
    require_once(__DIR__ .'/../database/user.class.php');
    
    $db = getDatabaseConnection();
    
    $user = User::getUserEmailPassword($db, $_POST['email'], $_POST['password']);

    if($user != null){
        $session->setId($user->id);
        $session->setName($user->name);
        header('Location: ../index.php');
        $session->addMessage('sucess', 'Login successful!');
    }else{
        $session->addMessage('error','Email or password incorrect');
        die(header('Location: ../../index.php'));
    }

    header('Location: ../../index.php');
?>