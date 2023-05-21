<?php
    require_once(__DIR__ .'/../database/connection.db.php');

    $filter = $_POST["filter"];
    $optargument = $_POST["optargument"];
    
    if($filter=="userclient"){
        $testquery = "SELECT * FROM Ticket WHERE (:idCreator=User.idUser AND User.username=:creator)";
        $statement = $db->prepare($testquery);
        $statement->bindParam(':creator', $_SESSION['User']);
        $statement->bindParam(':idCreator', $_SESSION['User']);
        $statement->execute();
        $yupii = $statement->fetch(PDO::FETCH_ASSOC);
        $yupiien = json_encode($yupii);
        echo $yupiien;
    }
    else if($filter == "department"){
        $testquery = "SELECT * FROM Ticket WHERE (AssignedTo=Ticket.assignedAgent AND Ticket.idDepartment=Department.idDepartment AND Department.Department=:department)";
        $statement = $db->prepare($testquery);
        $statement->bindParam(':department', $optargument);
        $statement->execute();
        $yupii = $statement->fetch(PDO::FETCH_ASSOC);
        $yupiien = json_encode($yupii);
        echo $yupiien;
    }
    else if($filter =="status"){
        $testquery = "SELECT * FROM Ticket WHERE Status=:sttus";
        $statement = $db->prepare($testquery);
        $statement->bindParam(':sttus', $optargument);
        $statement->execute();
        $yupii = $statement->fetch(PDO::FETCH_ASSOC);
        $yupiien = json_encode($yupii);
        echo $yupiien;
    }
    else if($filter == "hashtag"){
        $testquery = "SELECT * FROM Ticket WHERE Ticket.idTicket = Ticket_hashtag.idTicket AND Ticket_hashtag.idHashtag = Hashtags.idHashtag AND Hashtags.hashtag = :hashtag";
        $statement = $db->prepare($testquery);
        $statement->bindParam(':hashtag', $optargument);
        $statement->execute();
        $yupii = $statement->fetch(PDO::FETCH_ASSOC);
        $yupiien = json_encode($yupii);
        echo $yupiien;
    }
    else if($filter == "title"){
        $testquery = "SELECT Title FROM Ticket WHERE (:idCreator=idUser AND User.username=:creator)";
        $statement = $db->prepare($testquery);
        $statement->bindParam(':creator', $_SESSION['User']);
        $statement->execute();
        $yupii = $statement->fetch(PDO::FETCH_ASSOC);
        $yupiien = json_encode($yupii);
        echo $yupiien;
    }
?>