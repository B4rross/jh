<?php
    declare(strict_types=1);

    require_once(__DIR__. '/../database/connection.db.php');
    require_once(__DIR__. '/../database/faq.class.php');
    
    $db = getDatabaseConnection();
    
    $id= Faq::getMaxID($db);   
    $id= $id+1;
    
    Faq::createFAQ($db,$id,$_POST['quest'],$_POST['ans']);
    
    header('Location: /../pages/faq.php');
?>    