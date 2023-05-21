<?php

declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/user.class.php');

$db = getDatabaseConnection();

$username=$_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if the username or email is already taken
if (User::usernameExists($db, $username)) {
    // $session->addMessage('error', 'Username already taken.');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

if (User::emailExists($db, $email)) {
    // $session->addMessage('error', 'Email already registered.');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
$user = User::createUser($db, $username, $email, $password);

if ($user) {
    // $session->setId($user->id);
    // $session->setName($user->name);
    // $session->addMessage('success', 'Registration successful!');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    // $session->addMessage('error', 'Failed to register user.');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}