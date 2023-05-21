<?php 
    declare(strict_types = 1); 
    
    require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawRegisterForm() { ?>
    <div class="frase">
        <p>Create your account!</p>
    </div>
    <form action="../actions/action_register.php" method="post" class="login_register">
        <label>
            Username 
        </label>
        <input type="username" name="username"><br></br>
        <label>
            E-mail 
        </label>
        <input type="email" name="email"><br></br>
        <label>
            Password 
        </label>
        <input type="password" name="password"><br></br>
        </form>
        <div class="button">
            <button formaction="#" formmethod="post">Register</button>
            <p class="center">Already have an account?<a href="login.php" class="done">Login</a></p>
        </div>     
<?php } ?>