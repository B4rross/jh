<?php
// Assuming your database file is in the same directory as this PHP file
$databaseFile = 'basedados.db';

// Create a new PDO connection to the SQLite database
try {
    $pdo = new PDO("sqlite:$databaseFile");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Failed to connect to the database: " . $e->getMessage());
}

// Function to sanitize input values
function sanitize($value)
{
    $value = trim($value); // Remove leading/trailing white spaces
    return $value;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected department
    $selectedDepartment = $_POST['department'];

    // Get the user's message
    $userMessage = sanitize($_POST['message']);

    // Get the selected priority
    $selectedPriority = $_POST['priority'];

    $idUsername = $_SESSION['idUsername'];

    $ticketId = $_POST['ticket-id'];

    // Set default values
    $sttus = 'new';
    $assignedAgent = 1;
    $date = date('YYYY-mm-dd');

    // Insert the data into the database
    try {
        $stmt = $pdo->prepare("INSERT INTO Ticket (idTicket, idUsername, datas, assignedAgent, idDepartment, sttus, priority, mensagem) VALUES (:idTicket, :idUser, :datas, :assignedAgent, :idDepartment, :sttus, :priority, :mensagem)");
        $stmt->bindParam(':idDepartment', $selectedDepartment);
        $stmt->bindParam(':idTicket', $ticketId);
        $stmt->bindParam(':mensagem', $userMessage);
        $stmt->bindParam(':idUsername', $idUsername);
        $stmt->bindParam(':priority', $selectedPriority);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':assignedAgent', $assignedAgent);
        $stmt->bindParam(':datas', $date);
        $stmt->execute();
        echo "Ticket submitted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>