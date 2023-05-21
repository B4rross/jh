<?php 
    declare(strict_types = 1); 
    
    require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawLoginForm() { ?>
  <div class="frase1">
        <p>Login in your account!</p>
    </div>
    <form action="../actions/action_login.php" method="post" class="login_register">
        <label>
            Email 
        </label>
        <input type="email" name="email"><br></br>
        <label>
            Password 
        </label>
        <input type="password" name="password"><br></br>
      </form>    
      <div class="button">
            <button formaction="#" formmethod="post">Login</button>
            <p class="center">Don't have an account?<a href="login.php" class="done">Login</a></p>
      </div>
<?php } ?>