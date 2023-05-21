<?php
    declare(strict_types = 1);

    require_once(__DIR__ .'/../database/session.class.php');

    $session = new Session();

    if (!$session->isLoggedIn()) die(header('Location: /'));

    require_once(__DIR__ .'/../database/connection.db.php');
    require_once(__DIR__ .'/../database/user.class.php');
    
    $db = getDatabaseConnection();


    if($_POST['name']!=null){
        $stmt = $db->prepare('Update User SET Name = ? WHERE UserId = ?');
        $stmt->execute(array($_POST['name'],$session->getId()));
        $session->addMessage('success','User Name Updated');
    }

    if($_POST['password']!=null){
        $stmt = $db->prepare('Update User SET Password = ? WHERE UserId = ?');
        $stmt->execute(array(password_hash($_POST['password'],PASSWORD_DEFAULT),$session->getId()));
        $session->addMessage('success','User Password Updated');
    }


    if($_POST['username']!=null){
        $stmt = $db->prepare('Update User SET Username = ? WHERE UserId = ?');
        $stmt->execute(array($_POST['username'],$session->getId()));
        $session->addMessage('success','User Username Updated');;
    }

    header("Location: /../pages/editProfile.php");

?>