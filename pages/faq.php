<?php
    require_once(__DIR__ . '/../database/connection.db.php');
    require_once(__DIR__ . '/../database/session.class.php');
    require_once(__DIR__ . '/../templates/common.tpl.php');

    $session = new Session();

    drawHeader($session);

    $db = getDatabaseConnection();
?>
    <div id="menu">
        <link rel="stylesheet" href="../css/style.css">
        <h1>FAQ</h1>
        <section id="conteudo">
            <p>How do I create an account?</p>
            <p>What is the purpose of this website?</p>
            <p>How can I submit a ticket?</p>
            <p>Can I cancel or modify my ticket after it has been placed?</p>
        </section>    
    </div>
<?php
    drawFooter();
?>