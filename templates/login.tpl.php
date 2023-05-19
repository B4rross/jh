<?php 
    declare(strict_types = 1); 
    
    require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawLoginForm() { ?>
  <form action="../actions/action_login.php" method="post" class="login">
    <input type="email" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <button type="submit">Login</button>
  </form>
<?php } ?>