<?php
    declare (strict_types = 1);
    
    require_once(__DIR__ .'/../database/session.class.php');

    $session = new Session();

    require_once(__DIR__ .'/../database/connection.db.php');

    $db = getDatabaseConnection();


    $stmt = $db->prepare('INSERT INTO User (Password, Name, Email) VALUES (?, ?, ?)');
    try {
        $stmt->execute(array($_POST['nome'], $_POST['username'], $_POST['email'], password_hash($_POST['pass'],PASSWORD_DEFAULT), $roles));
    } catch (PDOException $e) {
        $session->addMessage('error','Email already exists');
        die(header('Location: /../pages/signup.php'));
    }
    
    $stmt1 = $db->prepare('SELECT idUser FROM USER WHERE Email = ?');
    $email = strval($_POST['email']);
    $stmt1->execute(array($email));

    if($user = $stmt1->fetch()){
       $session->setId(intval($user['idUser']));
    }
    header('Location: ../../index.php'); 
?>